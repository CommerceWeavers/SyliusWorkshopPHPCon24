<p align="center">
    <a href="https://sylius.com" target="_blank">
        <picture>
          <img alt="Sylius Logo" src="https://media.sylius.com/sylius-logo-800.png" height="100">
        </picture>
    </a>
    <a href="https://commerceweavers.com" target="_blank">
        <picture>
          <img alt="CW Logo" height="100" src="https://github.com/CommerceWeavers/SyliusWorkshopWarsaw24/blob/main/assets/images/cw-logo.png?raw=true">
        </picture>
    </a>
</p>

<h1 align="center">Sylius 2.0 Workshop PHPCon 24'</h1>

<p align="center">This is repository for Sylius 2.0 workshop that took place in Wisła on 25th of October 2024</p>

## Installation

### Traditional
```bash
$ wget http://getcomposer.org/composer.phar
$ php composer.phar create-project sylius/sylius-standard project
$ cd project
$ yarn install
$ yarn build
$ php bin/console sylius:install
$ symfony serve
$ open http://localhost:8000/
```

For more detailed instruction please visit [installation chapter in our docs](https://docs.sylius.com/en/latest/book/installation/installation.html).

### Docker
```bash
$ cp compose.override.dist.yml compose.override.yml
$ make setup
$ open http://localhost:9000/
```
