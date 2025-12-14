# 🚀 Render.com Setup Guide for Laravel

## Step-by-Step Instructions

### Step 1: Prepare Your Repository
Make sure you have:
- ✅ `Dockerfile` in root directory
- ✅ `.dockerignore` file
- ✅ All code pushed to GitHub

### Step 2: Create Database First
1. Go to [render.com](https://render.com)
2. Click "New +" → "PostgreSQL"
3. Name it: `telu-mind-db`
4. Select "Free" plan
5. Click "Create Database"
6. **Save these credentials** (you'll need them):
   - Internal Database URL
   - Database Name
   - Username
   - Password
   - Host
   - Port (usually 5432)

### Step 3: Create Web Service
1. Click "New +" → "Web Service"
2. Connect your GitHub account if not already connected
3. Select your repository: `WAD-final-project-group-2`
4. Click "Connect"

### Step 4: Configure Web Service

**Basic Settings:**
- **Name**: `telu-mind` (or your preferred name)
- **Environment**: Select **"Docker"** (NOT PHP - it's not available)
- **Region**: Choose closest to you
- **Branch**: `Rhythm` (or your main branch)
- **Root Directory**: Leave empty (or `/`)

**Docker Settings:**
- Render will automatically detect your `Dockerfile`
- No need to set build/start commands (Docker handles this)

### Step 5: Add Environment Variables

Click "Advanced" → "Add Environment Variable" and add:

```
APP_NAME=TelU Mind
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app-name.onrender.com
```

**Generate APP_KEY:**
1. In your local terminal, run:
   ```bash
   php artisan key:generate --show
   ```
2. Copy the key (starts with `base64:`)
3. Add as environment variable: `APP_KEY=base64:your_key_here`

**Database Variables:**
```
DB_CONNECTION=postgresql
DB_HOST=your-db-host-from-render
DB_PORT=5432
DB_DATABASE=your-db-name
DB_USERNAME=your-db-username
DB_PASSWORD=your-db-password
```

**Other Variables:**
```
GEMINI_API_KEY=your_gemini_api_key
SESSION_DRIVER=database
SESSION_LIFETIME=120
```

### Step 6: Deploy
1. Click "Create Web Service"
2. Wait for build to complete (5-10 minutes first time)
3. Watch the build logs for any errors

### Step 7: Run Migrations
After first successful deployment:

1. Go to your Web Service dashboard
2. Click "Shell" tab (or "Logs" → "Shell")
3. Run:
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

### Step 8: Update APP_URL
1. Go to your service settings
2. Find your service URL (e.g., `https://telu-mind.onrender.com`)
3. Update `APP_URL` environment variable to match
4. Redeploy if needed

## 🔧 Troubleshooting

### Build Fails
- Check build logs for errors
- Ensure `Dockerfile` is in root directory
- Verify all files are committed to GitHub

### Database Connection Error
- Verify database credentials are correct
- Use **internal database hostname** (not external)
- Check if database is in same region

### 500 Error After Deployment
- Check logs in Render dashboard
- Verify `APP_KEY` is set
- Run: `php artisan config:clear` in Shell
- Check storage permissions

### Assets Not Loading
- Verify `APP_URL` matches your Render URL
- Check if `public` folder is accessible
- Clear cache: `php artisan cache:clear`

## 📝 Quick Commands (in Render Shell)

```bash
# Clear all caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Run migrations
php artisan migrate --force

# Seed database
php artisan db:seed --force

# Check environment
php artisan env
```

## ✅ Checklist

- [ ] Database created in Render
- [ ] Web Service created with Docker environment
- [ ] All environment variables added
- [ ] APP_KEY generated and added
- [ ] Database credentials configured
- [ ] GEMINI_API_KEY added
- [ ] First deployment successful
- [ ] Migrations run
- [ ] APP_URL updated to match Render URL
- [ ] Application working correctly

## 🎉 You're Done!

Your Laravel app should now be live at: `https://your-app-name.onrender.com`

**Note:** Free tier apps spin down after 15 minutes of inactivity. First request after spin-down may take 30-60 seconds.

