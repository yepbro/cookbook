## Библия техно рецептов

Движок для создания сайтов с ответами на технические вопросы.

### Стек технологий

- PHP 8.3
- MySQL 8
- Laravel 10
- Livewire 3
- Tailwind 3
- Meilisearch
- Atlas, a free Tailwind CSS personal blog template

### Первое развертывание

- `git clone git@github.com:yepbro/cookbook.git ./`
- `cp .env.example .env`
- Изменить `APP_PREFIX` в `.env`
- `sail up`
- `sail composer install`
- `sail npm install`
- `sail artisan key:generate`
- `sail artisan storage:link`
- `sail artisan maigrate:fresh --seed`
- `sail artisan horizon`

##### INSTALLING PUPPETEER ON A FORGE PROVISIONED SERVER

Ubuntu 22

```
curl -sL https://deb.nodesource.com/setup_14.x | sudo -E bash -
sudo apt-get install -y nodejs gconf-service libasound2 libatk1.0-0 libc6 libcairo2 libcups2 libdbus-1-3 libexpat1 libfontconfig1 libgbm1 libgcc1 libgconf-2-4 libgdk-pixbuf2.0-0 libglib2.0-0 libgtk-3-0 libnspr4 libpango-1.0-0 libpangocairo-1.0-0 libstdc++6 libx11-6 libx11-xcb1 libxcb1 libxcomposite1 libxcursor1 libxdamage1 libxext6 libxfixes3 libxi6 libxrandr2 libxrender1 libxss1 libxtst6 ca-certificates fonts-liberation libappindicator1 libnss3 lsb-release xdg-utils wget libgbm-dev libxshmfence-dev
sudo npm install --location=global --unsafe-perm puppeteer@^17
sudo chmod -R o+rx /usr/lib/node_modules/puppeteer/.local-chromium
```
