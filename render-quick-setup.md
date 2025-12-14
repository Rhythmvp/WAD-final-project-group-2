# ⚡ Quick Render Setup with Your API Key

## Step 1: Create Database
1. Render Dashboard → "New +" → "PostgreSQL"
2. Name: `telu-mind-db`
3. Plan: Free
4. **Copy these values:**
   - Internal Database URL
   - Database Name
   - Username  
   - Password
   - Host
   - Port (usually 5432)

## Step 2: Create Web Service
1. "New +" → "Web Service"
2. Connect GitHub repo
3. Environment: **Docker**
4. Branch: `Rhythm`

## Step 3: Add Environment Variables

In your Web Service → **Environment** tab, add these:

### Required Variables:

```
APP_NAME=TelU Mind
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-service-name.onrender.com
```

### Generate APP_KEY:
```bash
php artisan key:generate --show
```
Copy the output and add as:
```
APP_KEY=base64:paste_here
```

### Database (from Step 1):
```
DB_CONNECTION=postgresql
DB_HOST=paste_internal_host_here
DB_PORT=5432
DB_DATABASE=paste_db_name_here
DB_USERNAME=paste_username_here
DB_PASSWORD=paste_password_here
```

### Session & API:
```
SESSION_DRIVER=database
SESSION_LIFETIME=120
GEMINI_API_KEY=AIzaSyDMAg7F-30d1SIHVXXxD_DvobzZCa6_Nlw
```

## Step 4: Deploy & Migrate
1. Click "Create Web Service"
2. Wait for deployment
3. Go to "Shell" tab
4. Run:
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

## ✅ Done!

Your app will be live at: `https://your-service-name.onrender.com`

**Remember:** Update `APP_URL` after first deployment to match your actual URL!

