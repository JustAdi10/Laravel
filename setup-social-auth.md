# Social Authentication Setup Guide

This guide will help you set up OAuth applications for Google, GitHub, and Facebook to enable social authentication in your Laravel application.

## 🔧 Quick Setup Checklist

- [ ] Google OAuth App
- [ ] GitHub OAuth App  
- [ ] Facebook OAuth App
- [ ] Environment Variables Updated
- [ ] Test Social Login

## 📋 Prerequisites

1. Your Laravel application should be running on `http://localhost:8000`
2. You should have accounts with Google, GitHub, and Facebook
3. Access to developer consoles for each platform

## 🌐 Provider Setup Instructions

### 1. Google OAuth Setup

#### Step 1: Create Google Cloud Project
1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Click "Select a project" → "New Project"
3. Enter project name: `Laravel Social Auth`
4. Click "Create"

#### Step 2: Enable Google+ API
1. In the left sidebar, go to "APIs & Services" → "Library"
2. Search for "Google+ API"
3. Click on it and press "Enable"

#### Step 3: Create OAuth Credentials
1. Go to "APIs & Services" → "Credentials"
2. Click "Create Credentials" → "OAuth client ID"
3. Choose "Web application"
4. Name: `Laravel App`
5. Authorized redirect URIs: `http://localhost:8000/auth/google/callback`
6. Click "Create"
7. Copy the Client ID and Client Secret

### 2. GitHub OAuth Setup

#### Step 1: Create OAuth App
1. Go to [GitHub Settings](https://github.com/settings/developers)
2. Click "OAuth Apps" → "New OAuth App"
3. Fill in the form:
   - Application name: `Laravel Social Auth`
   - Homepage URL: `http://localhost:8000`
   - Authorization callback URL: `http://localhost:8000/auth/github/callback`
4. Click "Register application"
5. Copy the Client ID and generate a Client Secret

### 3. Facebook OAuth Setup

#### Step 1: Create Facebook App
1. Go to [Facebook Developers](https://developers.facebook.com/)
2. Click "My Apps" → "Create App"
3. Choose "Consumer" → "Next"
4. App name: `Laravel Social Auth`
5. Click "Create App"

#### Step 2: Add Facebook Login
1. In your app dashboard, click "Add Product"
2. Find "Facebook Login" and click "Set Up"
3. Choose "Web"
4. Site URL: `http://localhost:8000`
5. Go to "Facebook Login" → "Settings"
6. Add Valid OAuth Redirect URIs: `http://localhost:8000/auth/facebook/callback`
7. Save changes
8. Go to "Settings" → "Basic" to get App ID and App Secret

## 🔑 Environment Configuration

Update your `.env` file with the credentials:

```env
# Google OAuth
GOOGLE_CLIENT_ID=your_google_client_id_here
GOOGLE_CLIENT_SECRET=your_google_client_secret_here
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback

# GitHub OAuth
GITHUB_CLIENT_ID=your_github_client_id_here
GITHUB_CLIENT_SECRET=your_github_client_secret_here
GITHUB_REDIRECT_URI=http://localhost:8000/auth/github/callback

# Facebook OAuth
FACEBOOK_CLIENT_ID=your_facebook_app_id_here
FACEBOOK_CLIENT_SECRET=your_facebook_app_secret_here
FACEBOOK_REDIRECT_URI=http://localhost:8000/auth/facebook/callback
```

## 🧪 Testing Your Setup

1. **Start your Laravel server:**
   ```bash
   php artisan serve
   ```

2. **Visit the demo page:**
   ```
   http://localhost:8000/auth-demo
   ```

3. **Test each provider:**
   - Click "Login with Google"
   - Click "Login with GitHub" 
   - Click "Login with Facebook"

4. **Verify functionality:**
   - Should redirect to provider's login page
   - After login, should redirect back to your app
   - User should be logged in and see dashboard

## 🚨 Common Issues & Solutions

### Issue: "Invalid redirect URI"
**Solution:** Make sure the redirect URIs in your OAuth apps exactly match the ones in your `.env` file.

### Issue: "App not verified" warning
**Solution:** This is normal for development. Users can click "Advanced" → "Go to [app name] (unsafe)" to continue.

### Issue: Facebook login not working
**Solution:** Make sure your Facebook app is in "Development" mode and you've added your Facebook account as a test user.

### Issue: "Client ID not found"
**Solution:** Double-check that you've copied the correct Client ID and Secret from each provider.

## 🔒 Security Notes

1. **Never commit credentials to version control**
2. **Use different OAuth apps for production**
3. **Enable HTTPS in production**
4. **Regularly rotate client secrets**
5. **Monitor OAuth app usage**

## 📚 Additional Resources

- [Laravel Socialite Documentation](https://laravel.com/docs/socialite)
- [Google OAuth Documentation](https://developers.google.com/identity/protocols/oauth2)
- [GitHub OAuth Documentation](https://docs.github.com/en/developers/apps/building-oauth-apps)
- [Facebook Login Documentation](https://developers.facebook.com/docs/facebook-login/)

## ✅ Verification Checklist

After setup, verify that:

- [ ] All three social login buttons work
- [ ] Users can register via social auth
- [ ] User data is saved correctly
- [ ] Profile pictures are displayed
- [ ] Users can log out
- [ ] Traditional email/password auth still works

---

**Need help?** Check the server logs in your terminal for detailed error messages, or refer to the provider-specific documentation linked above.
