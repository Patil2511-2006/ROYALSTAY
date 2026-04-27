import os
import zipfile
import ftplib
import urllib.request

# Configuration
ftp_host = "ftpupload.net"
ftp_user = "if0_41739304"
ftp_pass = "MIfejRqPoU9yJW"
remote_dir = "htdocs"
site_url = "http://ROYALSTAY.infinityfreeapp.com"
zip_filename = "upload_package.zip"

print("Starting prepare_and_upload.py...")

# 1. Create ZIP file
print("Creating ZIP file...")
with zipfile.ZipFile(zip_filename, 'w', zipfile.ZIP_DEFLATED) as zipf:
    for root, dirs, files in os.walk('.'):
        # Exclude unnecessary directories
        dirs[:] = [d for d in dirs if d not in ['.git', 'node_modules', 'premium-booking-ui', 'database_dumps']]
        
        for file in files:
            if file == zip_filename or file == 'prepare_and_upload.py' or file == 'unzip.php':
                continue
            file_path = os.path.join(root, file)
            arcname = os.path.relpath(file_path, '.')
            zipf.write(file_path, arcname)
print("ZIP file created successfully.")

# 2. Create unzip.php script
unzip_php_code = """<?php
$zip = new ZipArchive;
$res = $zip->open('upload_package.zip');
if ($res === TRUE) {
  $zip->extractTo('.');
  $zip->close();
  echo "Extraction successful!";
  unlink('upload_package.zip');
  unlink('unzip.php');
} else {
  echo "Extraction failed!";
}
?>"""
with open('unzip.php', 'w') as f:
    f.write(unzip_php_code)
print("unzip.php created.")

# 3. Upload files via FTP
print("Connecting to FTP...")
try:
    ftp = ftplib.FTP(ftp_host)
    ftp.login(ftp_user, ftp_pass)
    ftp.cwd(remote_dir)
    
    print("Uploading upload_package.zip...")
    with open(zip_filename, 'rb') as f:
        ftp.storbinary(f"STOR {zip_filename}", f)
        
    print("Uploading unzip.php...")
    with open('unzip.php', 'rb') as f:
        ftp.storbinary("STOR unzip.php", f)
        
    ftp.quit()
    print("FTP Upload Complete.")
except Exception as e:
    print("FTP Error:", e)

# 4. Trigger unzip via HTTP
print(f"Triggering unzipper at {site_url}/unzip.php...")
try:
    response = urllib.request.urlopen(f"{site_url}/unzip.php")
    print("Server response:", response.read().decode('utf-8'))
except Exception as e:
    print("HTTP Error:", e)

print("Process finished.")
