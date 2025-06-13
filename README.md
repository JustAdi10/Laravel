# Laravel Authentication with Social Login

A complete Laravel authentication system with social login integration for Google, GitHub, and Facebook.

## Quick Start

1. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database setup**
   ```bash
   php artisan migrate
   ```

4. **Build assets**
   ```bash
   npm run build
   ```

5. **Start the development server**
   ```bash
   php artisan serve
   ```

6. **Access the application**
   - Visit `http://localhost:8000`
   - Try the demo at `http://localhost:8000/auth-demo`

## Social Authentication Setup (Optional)

To enable social login, you need to configure OAuth applications:

1. **Google**: [Google Cloud Console](https://console.cloud.google.com/) - Set redirect URI to `http://localhost:8000/auth/google/callback`
2. **GitHub**: [GitHub Developer Settings](https://github.com/settings/developers) - Set callback URL to `http://localhost:8000/auth/github/callback`
3. **Facebook**: [Facebook Developers](https://developers.facebook.com/) - Set redirect URI to `http://localhost:8000/auth/facebook/callback`

Then update your `.env` file with the client credentials:

```env
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret

GITHUB_CLIENT_ID=your_github_client_id
GITHUB_CLIENT_SECRET=your_github_client_secret

FACEBOOK_CLIENT_ID=your_facebook_client_id
FACEBOOK_CLIENT_SECRET=your_facebook_client_secret
```

See `setup-social-auth.md` for detailed setup instructions.
