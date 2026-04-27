import ftplib
import os

# Configuration
ftp_host = "ftpupload.net"
ftp_user = "if0_41739304"
ftp_pass = "MIfejRqPoU9yJW"

print("Connecting to FTP...")
try:
    ftp = ftplib.FTP(ftp_host)
    ftp.login(ftp_user, ftp_pass)
    
    # Navigate to the database folder
    ftp.cwd('htdocs/database')
    
    print("Uploading updated config.php...")
    file_path = os.path.join('database', 'config.php')
    with open(file_path, 'rb') as f:
        ftp.storbinary("STOR config.php", f)
        
    ftp.quit()
    print("Upload Complete! Database connected successfully.")
except Exception as e:
    print("FTP Error:", e)
