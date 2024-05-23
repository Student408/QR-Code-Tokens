## Proof of Concept Report: Secure Website Access with QR Code Tokens

### Introduction

This proof of concept (PoC) demonstrates a secure method for accessing a restricted website or web page using QR codes containing unique tokens. The primary goal is to ensure that the tokens are never stored in the browser history, thereby mitigating the risk of unauthorized access or token exposure.

### Methodology

The proposed solution involves the following key components and steps:

1. **Database Setup**:
   - A MySQL database is used to store fixed tokens securely.
   - Random tokens are generated and inserted into the `tokens` table.

2. **QR Code Generation**:
   - A Python script is used to fetch tokens from the database.
   - For each token, a QR code is generated containing a URL with the token as a URL fragment (e.g., `https://example.com/#token`).

3. **Client-side Token Processing**:
   - An HTML file (`index.html`) is served to the user, containing JavaScript code.
   - The JavaScript code extracts the token from the URL fragment (`window.location.hash`) and redirects the user to a PHP script (`process.php`) without saving the token in the browser history.

4. **Server-side Token Handling**:
   - The `process.php` script stores the token in the user's session (`$_SESSION['token']`) and redirects the user to another PHP script (`verify.php`) for token verification.
   - The `verify.php` script retrieves the token from the session and checks its validity against the database.
   - If the token is valid, the user is granted access to the restricted page (main content).
   - If the token is invalid, an error message is displayed, and access is denied.

5. **Session Expiration**:
   - To enhance security, the session is automatically destroyed after a certain period of inactivity (e.g., 5 minutes).
   - This ensures that the user is logged out of the restricted page if they remain inactive for an extended period.

### Implementation

The PoC was implemented using the following technologies and tools:

- **Database**: MySQL
- **Server-side**: PHP
- **Client-side**: HTML, JavaScript
- **QR Code Generation**: Python (qrcode library)

The complete source code for the PoC is available in the `poc` directory of this repository.

### Testing and Results

The PoC was tested with various scenarios, including:

1. **Valid Token**: When a valid token was scanned from the QR code, the user was successfully granted access to the restricted page.
2. **Invalid Token**: When an invalid token was provided, the user was denied access, and an error message was displayed.
3. **Session Expiration**: After the configured inactivity period (5 minutes), the user's session was automatically destroyed, and they were logged out of the restricted page.
4. **Browser History**: The token was never stored in the browser history, ensuring that it remained secure and inaccessible to unauthorized parties.

Overall, the PoC successfully demonstrated the secure method for accessing a website using QR code tokens, meeting the primary objectives of preventing token exposure and unauthorized access.

### Security Considerations

While the PoC implements the core functionality, it's important to note that additional security measures should be considered for production environments:

- **HTTPS**: Implement HTTPS for secure communication to prevent eavesdropping and man-in-the-middle attacks.
- **CSRF Protection**: Implement CSRF (Cross-Site Request Forgery) protection techniques, such as CSRF tokens or SameSite cookies, to mitigate CSRF attacks.
- **Input Validation**: Implement proper input validation and sanitization to prevent injection attacks and other vulnerabilities.
- **Secure Token Generation**: Ensure that the token generation process is secure and uses strong cryptographic principles.
- **Token Expiration**: Consider implementing token expiration mechanisms to enhance security further.
- **Rate Limiting**: Implement rate limiting to prevent brute-force attacks and excessive token validation attempts.

### Conclusion

The proof of concept successfully demonstrated a secure method for accessing a website using QR codes containing tokens, ensuring that the tokens are never stored in the browser history. By following the proposed approach and implementing additional security measures, organizations can enhance the security of their restricted web pages or content while providing a seamless user experience.