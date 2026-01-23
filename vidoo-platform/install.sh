#!/bin/bash

# Vidoo Platform - Auto Installer Script
# سكريبت التثبيت التلقائي لمنصة فيدوو

echo ""
echo "╔═══════════════════════════════════════════════════╗"
echo "║                                                   ║"
echo "║          🎬 منصة فيدوو - التثبيت التلقائي       ║"
echo "║               Vidoo Platform Installer            ║"
echo "║                                                   ║"
echo "╚═══════════════════════════════════════════════════╝"
echo ""

# Colors
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if running from correct directory
if [ ! -f "composer.json" ]; then
    echo -e "${RED}❌ Error: Please run this script from the vidoo-platform directory${NC}"
    exit 1
fi

echo "📦 Step 1: Installing Composer Dependencies..."
if [ ! -d "vendor" ]; then
    composer install --optimize-autoloader
    echo -e "${GREEN}✅ Composer dependencies installed${NC}"
else
    echo -e "${YELLOW}ℹ️  Vendor directory already exists${NC}"
fi
echo ""

echo "⚙️  Step 2: Setting up Environment..."
if [ ! -f ".env" ]; then
    cp .env.example .env
    echo -e "${GREEN}✅ .env file created${NC}"
else
    echo -e "${YELLOW}ℹ️  .env file already exists${NC}"
fi

php artisan key:generate
echo -e "${GREEN}✅ Application key generated${NC}"
echo ""

echo "🗄️  Step 3: Setting up Database..."
if [ ! -f "database/database.sqlite" ]; then
    touch database/database.sqlite
    chmod 666 database/database.sqlite
    echo -e "${GREEN}✅ SQLite database created${NC}"
else
    echo -e "${YELLOW}ℹ️  Database file already exists${NC}"
fi
echo ""

echo "🔄 Step 4: Running Migrations & Seeders..."
php artisan migrate:fresh --force
echo -e "${GREEN}✅ Migrations completed${NC}"

php artisan db:seed --class=CurrencySeeder --force
echo -e "${GREEN}✅ Currencies seeded (4 Arab currencies)${NC}"

php artisan db:seed --class=CountrySeeder --force
echo -e "${GREEN}✅ Countries seeded (22 Arab countries)${NC}"
echo ""

echo "🔐 Step 5: Setting Permissions..."
chmod -R 775 storage bootstrap/cache
echo -e "${GREEN}✅ Permissions set${NC}"
echo ""

echo "═══════════════════════════════════════════════════"
echo -e "${GREEN}🎉 Installation Complete!${NC}"
echo ""
echo "To start the server, run:"
echo -e "${GREEN}   php artisan serve${NC}"
echo ""
echo "Then open your browser at:"
echo "   http://localhost:8000"
echo ""
echo "Available Pages:"
echo "   http://localhost:8000/ (Home)"
echo "   http://localhost:8000/login (Login)"
echo "   http://localhost:8000/client/register (Client Registration)"
echo "   http://localhost:8000/creator/register (Creator Registration)"
echo "═══════════════════════════════════════════════════"
