# Deployment Guide for TelU Mind

## 🚀 Best Hosting Options for Laravel

### Option 1: Render.com (Recommended - Free Tier Available)

**Steps:**
1. Go to [render.com](https://render.com) and sign up
2. Connect your GitHub repository
3. Create a new "Web Service"
4. Select your repository
5. **Important**: Since PHP is not directly listed, use **Docker**:
   - **Environment**: Docker
   - Render will automatically detect the `Dockerfile` in your repo
6. Add environment variables in Render dashboard:
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_KEY` (generate with: `php artisan key:generate --show` or use Render's auto-generate)
   - `APP_URL=https://your-app-name.onrender.com` (replace with your actual URL)
   - `DB_CONNECTION=mysql`
   - `DB_HOST` (from Render database - internal hostname)
   - `DB_DATABASE` (from Render database)
   - `DB_USERNAME` (from Render database)
   - `DB_PASSWORD` (from Render database)
   - `DB_PORT=3306`
   - `GEMINI_API_KEY=your_key_here`
   - `SESSION_DRIVER=database`
7. Create a **PostgreSQL** database in Render (MySQL also available but PostgreSQL is recommended):
   - Go to "New +" → "PostgreSQL"
   - Note the internal database URL
8. After first deployment, run migrations:
   - Go to your service → "Shell" tab
   - Run: `php artisan migrate --force`
   - Run: `php artisan db:seed --force` (optional)
9. Deploy!

**Free Tier Limits:**
- 750 hours/month (enough for most projects)
- Spins down after 15 min inactivity (first request may be slow)
- 512MB RAM

---

### Option 2: Railway.app (Easy Setup)

**Steps:**
1. Go to [railway.app](https://railway.app) and sign up
2. Click "New Project" → "Deploy from GitHub repo"
3. Select your repository
4. Railway auto-detects Laravel
5. Add environment variables in the dashboard
6. Add MySQL/PostgreSQL database
7. Deploy!

**Free Tier:**
- $5 credit/month
- Pay-as-you-go after

---

### Option 3: Fly.io (Good Performance)

**Steps:**
1. Install Fly CLI: `curl -L https://fly.io/install.sh | sh`
2. Run: `fly launch`
3. Follow prompts
4. Add secrets: `fly secrets set GEMINI_API_KEY=your_key`
5. Deploy: `fly deploy`

**Free Tier:**
- 3 shared-cpu VMs
- 3GB persistent volumes

---

### Option 4: DigitalOcean App Platform

**Steps:**
1. Go to [digitalocean.com](https://www.digitalocean.com)
2. Create App Platform
3. Connect GitHub
4. Configure build and run commands
5. Add database and environment variables

**Pricing:** Starts at $5/month

---

## 📋 Pre-Deployment Checklist

### 1. Update .env for Production
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-db-password

GEMINI_API_KEY=your-gemini-key
SESSION_DRIVER=database
```

### 2. Optimize Laravel
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### 3. Run Migrations
```bash
php artisan migrate --force
php artisan db:seed --force
```

### 4. Set Permissions
```bash
chmod -R 755 storage bootstrap/cache
```

---

## 🔒 Security Checklist

- [ ] Set `APP_DEBUG=false` in production
- [ ] Use strong `APP_KEY`
- [ ] Never commit `.env` file
- [ ] Use HTTPS (most platforms provide this)
- [ ] Set secure session driver
- [ ] Use environment variables for all secrets

---

## 📝 Environment Variables Needed

```
APP_NAME="TelU Mind"
APP_ENV=production
APP_KEY=base64:...
APP_DEBUG=false
APP_URL=https://your-app.com

DB_CONNECTION=mysql
DB_HOST=...
DB_PORT=3306
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...

GEMINI_API_KEY=...
SESSION_DRIVER=database
SESSION_LIFETIME=120
```

---

## 🆘 Troubleshooting

**Issue: 500 Error**
- Check logs: `php artisan log:show` or view in hosting dashboard
- Verify all environment variables are set
- Run `php artisan config:clear` and redeploy

**Issue: Database Connection Failed**
- Verify database credentials
- Check if database is accessible from your app
- Ensure migrations ran: `php artisan migrate --force`

**Issue: Assets Not Loading**
- Run `php artisan storage:link` if using storage
- Check `APP_URL` is correct
- Clear cache: `php artisan cache:clear`

---

## 💡 Quick Deploy Commands

```bash
# Before deploying
git add .
git commit -m "Prepare for deployment"
git push origin main

# After deployment, run migrations
php artisan migrate --force
php artisan db:seed --force
```

---

## 🎯 Recommended: Render.com

**Why Render?**
- ✅ Free tier for students
- ✅ Easy GitHub integration
- ✅ Automatic SSL/HTTPS
- ✅ Built-in database
- ✅ Simple environment variable management
- ✅ Good documentation

**Get Started:**
1. Visit: https://render.com
2. Sign up with GitHub
3. Click "New +" → "Web Service"
4. Connect your repo
5. Follow the setup above

---

Need help? Check the hosting platform's Laravel documentation!

