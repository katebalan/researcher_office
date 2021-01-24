composer create-project symfony/skeleton researcher_office

git init
git commit -m "initial commit"
git remote add origin git@github.com:katebalan/researcher_office.git
git push -u origin master

composer require server
composer require annotations
composer require sec-checker
composer require twig

composer require symfony/maker-bundle --dev
 php bin/console list make

composer require profiler --dev
composer require debug --dev

composer require security
composer require symfony/expression-language
composer require orm
composer require doctrine
php bin/console make:user
php bin/console make:auth

composer require orm-fixtures --dev
bin/console make:fixtures


Webpack
yarn encore dev
yarn encore dev --watch
yarn encore production

