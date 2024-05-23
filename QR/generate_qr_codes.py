import qrcode
import mysql.connector

# Connect to the database
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="token_database"
)

# Fetch tokens from the database
cursor = db.cursor()
cursor.execute("SELECT token FROM tokens")
tokens = [row[0] for row in cursor.fetchall()]

# Generate QR codes for each token
for token in tokens:
    qr = qrcode.QRCode(
        version=1,
        error_correction=qrcode.constants.ERROR_CORRECT_L,
        box_size=10,
        border=4,
    )
    # qr.add_data(f"https://example.net/#{token}")
    qr.add_data(f"http://localhost/QR-Code-Tokens/#{token}") #change the link
    qr.make(fit=True)
    img = qr.make_image(fill_color="black", back_color="white")
    img.save(f"{token}.png")

cursor.close()
db.close()
