# Secure Website Access with QR Code Tokens

This project demonstrates a secure method for accessing a website or web page using QR codes containing unique tokens. The primary goal is to ensure that the tokens are never stored in the browser history, thereby mitigating the risk of unauthorized access or token exposure.

## Live Demo

- [https://theloko.me/club-coffee/](https://studentoffers.great-site.net)

## Features

- Secure token storage in a database
- QR code generation with embedded tokens
- Client-side token extraction and redirection without storing in browser history
- Server-side token validation and access control
- Automatic session expiration after a specified inactivity period

## Getting Started

### Prerequisites

- PHP
- MySQL
- Python (with the `qrcode` library installed)

### Installation

1. Clone the repository:

```
git clone https://github.com/Student408/QR-Code-Tokens.git
```

2. Set up the database:
   - Create a new MySQL database
   - Import the `database.sql` file to create the necessary tables and sample data

3. Configure the database connection:
   - Open the `verify.php` file
   - Update the database credentials (`hostname`, `username`, `password`, `database_name`) with your MySQL configuration

4. Generate QR codes:
   - Run the `generate_qr_codes.py` script to fetch tokens from the database and generate QR code images

```
python generate_qr_codes.py
```

5. Start the web server and access the application through `index.html`.

## Usage

1. Print or display the generated QR codes at the locations where users need to scan them.
2. When a user accesses the `index.html` page, they will be prompted to scan the QR code.
3. After scanning the QR code, the user's token will be processed securely without being stored in the browser history.
4. If the token is valid, the user will be granted access to the restricted page.
5. If the token is invalid or the session expires due to inactivity, the user will be denied access.

## Security Considerations

- This project implements basic security measures, but for production environments, it's recommended to:
  - Use HTTPS for secure communication
  - Implement CSRF (Cross-Site Request Forgery) protection techniques
  - Implement proper input validation and sanitization
  - Ensure secure token generation and consider token expiration mechanisms
  - Implement rate limiting to prevent brute-force attacks

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
```
