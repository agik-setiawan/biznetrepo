## About Biznetrepo
Biznetrepo is package for biznet internal Developer Team
## How to Install this Package
- composer require biznetrepo/biznetrepo
- add Service Provider "Biznetrepo\Laravel\Providers\BiznetRepoServiceProvider::class," to config/app.php
- add Alias "'BiznetArea'=>Biznetrepo\Laravel\Supports\Facades\Sites\AreaFacade::class," to config/app.php
- run command "php artisan config:clear"
- run command "php artisan vendor:publish --tag=biznetrepo"
- config API Token and Headers in config/api_biznet.php
## How to Use this Package
- BiznetArea::getCityAvailableInstance() for instance return
- BiznetArea::getCityAvailable() for array return