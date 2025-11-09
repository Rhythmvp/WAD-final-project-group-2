# 🎨 TelU Mind - UI/UX Design System

## 📋 Table of Contents
1. [Color Palette](#color-palette)
2. [Typography](#typography)
3. [Spacing & Layout](#spacing--layout)
4. [Components](#components)
5. [CSS Variables](#css-variables)

---

## 🎨 Color Palette

### **Primary Colors**
```css
/* Main Brand Colors */
--primary-purple: #667eea;
--primary-dark: #5568d3;
--secondary-purple: #764ba2;

/* Gradient */
--gradient-main: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
```

**Usage:**
- `#667eea` - Primary buttons, links, main CTAs
- `#5568d3` - Hover states for primary elements
- `#764ba2` - Secondary accents, gradient end

---

### **Background Colors**
```css
/* Backgrounds */
--bg-main: #f5f7fa;           /* Page background */
--bg-white: #ffffff;          /* Cards, forms, containers */
--bg-light-gray: #fafbfc;     /* Alternative background */
```

---

### **Text Colors**
```css
/* Text */
--text-primary: #333333;      /* Headings, main text */
--text-secondary: #555555;    /* Body text */
--text-muted: #888888;        /* Labels, captions */
--text-light: #666666;        /* Disabled text */
```

---

### **Status Colors**
```css
/* Success */
--success-bg: #e8f5e9;        /* Light green background */
--success-text: #2e7d32;      /* Dark green text */
--success-border: #4caf50;    /* Green border */

/* Error */
--error-bg: #ffebee;          /* Light red background */
--error-text: #c62828;        /* Dark red text */
--error-border: #f44336;      /* Red border */

/* Warning */
--warning-bg: #fff3e0;        /* Light orange background */
--warning-text: #e65100;      /* Dark orange text */
--warning-border: #ff9800;    /* Orange border */

/* Info */
--info-bg: #e3f2fd;           /* Light blue background */
--info-text: #1565c0;         /* Dark blue text */
--info-border: #2196f3;       /* Blue border */
```

---

### **Feature Section Colors**

#### **Mind Section** (Mental Health)
```css
--mind-primary: #667eea;      /* Purple/Blue */
--mind-light: #e8eaf6;
--mind-icon: 🧘
```

#### **Body Section** (Physical Health)
```css
--body-primary: #ff6b6b;      /* Coral Red */
--body-light: #ffe0e0;
--body-icon: 💪
```

#### **Connect Section** (Social Health)
```css
--connect-primary: #4ecdc4;   /* Turquoise */
--connect-light: #e0f7f5;
--connect-icon: 🤝
```

---

### **Mood Tracker Colors**
```css
/* Mood Levels */
--mood-very-bad: #f44336;     /* Red - 😢 */
--mood-bad: #ff9800;          /* Orange - 😕 */
--mood-okay: #ffc107;         /* Yellow - 😐 */
--mood-good: #8bc34a;         /* Light Green - 😊 */
--mood-excellent: #4caf50;    /* Green - 😄 */
```

---

### **Border & Shadow Colors**
```css
/* Borders */
--border-light: #e0e0e0;
--border-medium: #cccccc;
--border-dark: #999999;

/* Shadows */
--shadow-sm: 0 2px 5px rgba(0, 0, 0, 0.1);
--shadow-md: 0 5px 15px rgba(0, 0, 0, 0.1);
--shadow-lg: 0 10px 40px rgba(0, 0, 0, 0.2);
```

---

## 📝 Typography

### **Font Family**
```css
--font-primary: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
--font-monospace: 'Courier New', monospace;
```

### **Font Sizes**
```css
--font-xs: 0.75rem;    /* 12px */
--font-sm: 0.875rem;   /* 14px */
--font-base: 1rem;     /* 16px */
--font-lg: 1.125rem;   /* 18px */
--font-xl: 1.25rem;    /* 20px */
--font-2xl: 1.5rem;    /* 24px */
--font-3xl: 2rem;      /* 32px */
--font-4xl: 3rem;      /* 48px */
```

### **Font Weights**
```css
--font-normal: 400;
--font-medium: 500;
--font-semibold: 600;
--font-bold: 700;
```

---

## 📏 Spacing & Layout

### **Spacing Scale**
```css
--space-1: 0.25rem;    /* 4px */
--space-2: 0.5rem;     /* 8px */
--space-3: 0.75rem;    /* 12px */
--space-4: 1rem;       /* 16px */
--space-5: 1.25rem;    /* 20px */
--space-6: 1.5rem;     /* 24px */
--space-8: 2rem;       /* 32px */
--space-10: 2.5rem;    /* 40px */
--space-12: 3rem;      /* 48px */
```

### **Border Radius**
```css
--radius-sm: 5px;
--radius-md: 8px;
--radius-lg: 10px;
--radius-xl: 15px;
--radius-2xl: 20px;
--radius-full: 50px;
```

### **Max Widths**
```css
--max-width-sm: 450px;    /* Forms, login/register */
--max-width-md: 800px;    /* Single column content */
--max-width-lg: 1000px;   /* Feature pages */
--max-width-xl: 1200px;   /* Dashboard, main layout */
```

---

## 🎯 Components

### **Buttons**
```css
/* Primary Button */
.btn-primary {
    background: #667eea;
    color: white;
    padding: 1rem 2rem;
    border-radius: 8px;
    font-weight: bold;
}

.btn-primary:hover {
    background: #5568d3;
}

/* Secondary Button */
.btn-secondary {
    background: transparent;
    color: #667eea;
    border: 2px solid #667eea;
    padding: 1rem 2rem;
    border-radius: 8px;
}

/* Success Button */
.btn-success {
    background: #4caf50;
    color: white;
}

/* Danger Button */
.btn-danger {
    background: #f44336;
    color: white;
}
```

### **Cards**
```css
.card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.card:hover {
    transform: translateY(-5px);
    transition: transform 0.3s;
}
```

### **Forms**
```css
.form-input {
    width: 100%;
    padding: 0.8rem;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 1rem;
}

.form-input:focus {
    border-color: #667eea;
    outline: none;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    color: #555555;
    font-weight: 500;
}
```

### **Navbar**
```css
.navbar {
    background: white;
    padding: 1rem 2rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.logo {
    font-size: 1.5rem;
    font-weight: bold;
    color: #667eea;
}
```

### **Alert/Message Boxes**
```css
/* Success Alert */
.alert-success {
    background: #e8f5e9;
    color: #2e7d32;
    padding: 1rem;
    border-radius: 8px;
    border-left: 4px solid #4caf50;
}

/* Error Alert */
.alert-error {
    background: #ffebee;
    color: #c62828;
    padding: 1rem;
    border-radius: 8px;
    border-left: 4px solid #f44336;
}

/* Info Alert */
.alert-info {
    background: #e3f2fd;
    color: #1565c0;
    padding: 1rem;
    border-radius: 8px;
    border-left: 4px solid #2196f3;
}
```

---

## 💻 CSS Variables (Complete)

```css
:root {
    /* Primary Colors */
    --primary-purple: #667eea;
    --primary-dark: #5568d3;
    --secondary-purple: #764ba2;
    
    /* Backgrounds */
    --bg-main: #f5f7fa;
    --bg-white: #ffffff;
    --bg-light-gray: #fafbfc;
    
    /* Text */
    --text-primary: #333333;
    --text-secondary: #555555;
    --text-muted: #888888;
    --text-light: #666666;
    
    /* Status Colors */
    --success: #4caf50;
    --error: #f44336;
    --warning: #ff9800;
    --info: #2196f3;
    
    /* Feature Colors */
    --mind-color: #667eea;
    --body-color: #ff6b6b;
    --connect-color: #4ecdc4;
    
    /* Spacing */
    --space-xs: 0.25rem;
    --space-sm: 0.5rem;
    --space-md: 1rem;
    --space-lg: 1.5rem;
    --space-xl: 2rem;
    
    /* Border Radius */
    --radius-sm: 5px;
    --radius-md: 8px;
    --radius-lg: 15px;
    --radius-full: 50px;
    
    /* Shadows */
    --shadow-sm: 0 2px 5px rgba(0, 0, 0, 0.1);
    --shadow-md: 0 5px 15px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 40px rgba(0, 0, 0, 0.2);
    
    /* Typography */
    --font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    --font-size-base: 1rem;
    --font-weight-normal: 400;
    --font-weight-medium: 500;
    --font-weight-bold: 700;
}
```

---

## 🎨 Color Usage Guidelines

### **When to use each color:**

| Color | Usage |
|-------|-------|
| `#667eea` | Primary CTAs, main buttons, links, logo |
| `#764ba2` | Gradients, accent elements |
| `#f5f7fa` | Page backgrounds |
| `#ffffff` | Cards, forms, modals |
| `#333333` | Headings, important text |
| `#555555` | Body text, paragraphs |
| `#888888` | Secondary text, timestamps |
| `#4caf50` | Success messages, positive actions |
| `#f44336` | Errors, delete actions |
| `#2196f3` | Info boxes, notifications |

---

## 🖼️ Icon Guidelines

### **Emoji Icons Used:**
- 🧠 - Logo & Branding
- 😊 😢 😕 😐 😄 - Mood Tracker
- 📝 - Journal
- 💬 - Peer Consul
- 🏃 - Movement Tracker
- 🥗 - Health Food
- 🎯 - Challenges
- 👥 - Community
- 📅 - Calendar
- 🏥 - Clinic Access

---

## 📱 Responsive Breakpoints

```css
/* Mobile First Approach */
--breakpoint-sm: 576px;   /* Small devices */
--breakpoint-md: 768px;   /* Tablets */
--breakpoint-lg: 992px;   /* Desktops */
--breakpoint-xl: 1200px;  /* Large desktops */
```

---

## ✅ Implementation Checklist

- [ ] Add CSS variables to main stylesheet
- [ ] Use consistent button styles across all pages
- [ ] Apply card styles for content containers
- [ ] Use gradient for hero sections
- [ ] Implement status colors for alerts
- [ ] Maintain consistent spacing
- [ ] Apply border radius consistently
- [ ] Use shadow for depth
- [ ] Keep typography consistent

---

## 📄 Example Usage in CSS

```css
/* Example: Creating a new button */
.my-button {
    background: var(--primary-purple);
    color: white;
    padding: var(--space-md) var(--space-lg);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
}

.my-button:hover {
    background: var(--primary-dark);
}

/* Example: Creating a card */
.my-card {
    background: var(--bg-white);
    padding: var(--space-xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
}
```

---

## 🎯 Quick Reference Card

**Copy this to your workspace:**

```
PRIMARY: #667eea (Purple-Blue)
GRADIENT: linear-gradient(135deg, #667eea 0%, #764ba2 100%)
BACKGROUND: #f5f7fa
SUCCESS: #4caf50
ERROR: #f44336
TEXT: #333333
SPACING: 0.25rem, 0.5rem, 1rem, 1.5rem, 2rem
RADIUS: 5px, 8px, 15px, 50px
SHADOW: 0 5px 15px rgba(0, 0, 0, 0.1)
```

---

**Last Updated:** November 2025  
**Project:** TelU Mind - Campus Wellness Platform  
**Framework:** Laravel + Bootstrap