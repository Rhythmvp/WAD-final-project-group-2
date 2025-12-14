# 🔐 Render.com Environment Variables Setup

## ⚠️ IMPORTANT: Do NOT Upload .env File!

**Never commit or upload your `.env` file to GitHub or Render!** Instead, add environment variables directly in Render's dashboard.

## 📋 Environment Variables to Add in Render Dashboard

Go to your Web Service → **Environment** tab → **Add Environment Variable**

### 1. Application Settings

```
APP_NAME=TelU Mind
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app-name.onrender.com
```

**Note:** Replace `your-app-name` with your actual Render service name.

### 2. Application Key (APP_KEY)

**Generate it first:**
```bash
php artisan key:generate --show
```

Then add it as:
```
APP_KEY=base64:your_generated_key_here
```

### 3. Database Settings (PostgreSQL)

Get these from your Render PostgreSQL database dashboard:

```
DB_CONNECTION=postgresql
DB_HOST=your-db-host-from-render
DB_PORT=5432
DB_DATABASE=your-db-name
DB_USERNAME=your-db-username
DB_PASSWORD=your-db-password
```

**Important:** Use the **Internal Database URL** from Render, not the external one.

### 4. Session Settings

```
SESSION_DRIVER=database
SESSION_LIFETIME=120
```

### 5. Gemini API Key

```
GEMINI_API_KEY=AIzaSyDMAg7F-30d1SIHVXXxD_DvobzZCa6_Nlw
```

### 6. Logging (Optional)

```
LOG_CHANNEL=stack
LOG_LEVEL=error
```

## 🚀 Quick Setup Steps

1. **Create PostgreSQL Database in Render:**
   - Go to "New +" → "PostgreSQL"
   - Name: `telu-mind-db`
   - Plan: Free
   - Copy the connection details

2. **Add Environment Variables:**
   - Go to your Web Service
   - Click "Environment" tab
   - Add each variable above
   - Click "Save Changes"

3. **Generate APP_KEY:**
   - In your local terminal: `php artisan key:generate --show`
   - Copy the output (starts with `base64:`)
   - Add as `APP_KEY` in Render

4. **Update APP_URL:**
   - After first deployment, get your app URL
   - Update `APP_URL` to match (e.g., `https://telu-mind.onrender.com`)

## ✅ Complete Environment Variables List

Copy and paste these into Render (fill in the database values):

```
APP_NAME=TelU Mind
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-app-name.onrender.com
DB_CONNECTION=postgresql
DB_HOST=dpg-xxxxx-a.oregon-postgres.render.com
DB_PORT=5432
DB_DATABASE=telu_mind_xxxx
DB_USERNAME=telu_mind_user
DB_PASSWORD=your_db_password_here
SESSION_DRIVER=database
SESSION_LIFETIME=120
GEMINI_API_KEY=AIzaSyDMAg7F-30d1SIHVXXxD_DvobzZCa6_Nlw
LOG_CHANNEL=stack
LOG_LEVEL=error
```

## 🔒 Security Notes

- ✅ `.env` is in `.gitignore` - it won't be committed
- ✅ Never share your API keys publicly
- ✅ Use Render's environment variables (encrypted)
- ✅ Regenerate API keys if accidentally exposed

## 📝 After Adding Variables

1. **Redeploy** your service (Render will use new variables)
2. **Run migrations** in Shell:
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

## 🆘 Troubleshooting

**If variables not working:**
- Make sure you clicked "Save Changes"
- Redeploy the service
- Check variable names (case-sensitive)
- Verify no extra spaces in values

