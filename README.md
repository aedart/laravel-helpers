[![Latest Stable Version](https://poser.pugx.org/aedart/laravel-helpers/v/stable)](https://packagist.org/packages/aedart/laravel-helpers)
[![Total Downloads](https://poser.pugx.org/aedart/laravel-helpers/downloads)](https://packagist.org/packages/aedart/laravel-helpers)
[![Latest Unstable Version](https://poser.pugx.org/aedart/laravel-helpers/v/unstable)](https://packagist.org/packages/aedart/laravel-helpers)
[![License](https://poser.pugx.org/aedart/laravel-helpers/license)](https://packagist.org/packages/aedart/laravel-helpers)
[![Monthly Downloads](https://poser.pugx.org/aedart/laravel-helpers/d/monthly)](https://packagist.org/packages/aedart/laravel-helpers)
[![Daily Downloads](https://poser.pugx.org/aedart/laravel-helpers/d/daily)](https://packagist.org/packages/aedart/laravel-helpers)

## Laravel Helpers ##

[Getters and Setters](https://en.wikipedia.org/wiki/Mutator_method) utility package for some of [Laravel's](http://laravel.com/) core package. 

This package make use of Laravel's native [Facades](http://laravel.com/docs/5.1/facades), as a fallback, when no custom instances are provided.

## Contents ##

[TOC]

## When to use this ##

* When your component depends on one or several of Laravel's native components
* When there is a strong need to interface such dependencies 
* When you need to be able to set a different instance, of a given native component, e.g. your implemented version

## When not to use this ##

If you are using a modern [IDE](https://en.wikipedia.org/wiki/Integrated_development_environment), then the added [PHPDoc](http://www.phpdoc.org/) will ensure code-hinting of
the various method's return type. However, you shouldn't blindly use these helpers, just for the sake of gaining code-hinting, for Laravel's Facades. If you are just seeking that,
then perhaps Barry vd. Heuvel's [Laravel IDE Helper Generator](https://github.com/barryvdh/laravel-ide-helper) package is a far better solution for you.


## How to install ##

```
#!console

composer require aedart/laravel-helpers
```

This package uses [composer](https://getcomposer.org/). If you do not know what that is or how it works, I recommend that you read a little about, before attempting to use this package.

## Quick start ##

### Component-aware interface, and component-trait ###

Lets imagine that you have some kind of component, that needs to be aware of a configuration repository. You can ensure such, by implementing the `\Aedart\Laravel\Helpers\Contracts\Config\ConfigAware` interface.
Furthermore, a default implementation is available, via the `\Aedart\Laravel\Helpers\Traits\Config\ConfigTrait` trait.

```
#!php
<?php
use Aedart\Laravel\Helpers\Contracts\Config\ConfigAware;
use Aedart\Laravel\Helpers\Traits\Config\ConfigTrait;

class MyComponent implements ConfigAware {
    use ConfigTrait;
}
```

Now, you component is able to set and get an instance of Laravel's `\Illuminate\Contracts\Config\Repository`. This means that, if you have a custom implementation of such a repository, then
you can specify it on the component;

```
#!php
<?php

// Somewhere in you application...
$myComponent = new MyComponent();
$myComponent->setConfig($myCustomConfigRepository);

```

### Default fallback to Laravel's Facades ###

All traits have a default fallback method, which invokes Laravel's corresponding facades, ensuring that even if you do not specify an instance, a given component is returned;

```
#!php
<?php

// When no custom configuration repository has been specified... Laravel's default configuration 
$myComponent = new MyComponent();
$configRepository = $myComponent->getConfig(); // Uses fallback, invokes the `\Illuminate\Support\Facades\Config`, which is then resolved from the IoC Service Container 

```

### Usage inside a Laravel application ###

You do not need any special configuration, service provides, or any of this sort. Just ensure that you have required this package as a dependency, and you are good to go.

### Outside a Laravel application ###

If you plan to use this package outside a Laravel application, then you might require additional dependencies.

**Example**

If you need to work with the filesystem components, then you must require Laravel's filesystem package;

```
#!console

composer require illuminate/filesystem
```

#### IoC Service Container - no fallback ####

If this package is used outside Laravel, then implemented traits cannot provide any fallback, in case a given instance was not set. If you wish to provide a default fallback, then
you can simple overwrite the `getDefaultXZY` methods, in your component.

```
#!php
<?php
use Aedart\Laravel\Helpers\Contracts\Config\ConfigAware;
use Aedart\Laravel\Helpers\Traits\Config\ConfigTrait;
use Illuminate\Config\Repository;

class MyComponent implements ConfigAware {
    use ConfigTrait;
    
    public function getDefaultConfig() {
        return new Repository(); // Please note that this repository will NOT store values statically!
    }
}
```

As an alternative, you can also bind your dependencies. Read more about Laravel's [IoC Service Container](http://laravel.com/docs/5.1/container), in order to learn more about this.

## Contribution ##

Have you found a defect ( [bug or design flaw](https://en.wikipedia.org/wiki/Software_bug) ), or do you wish improvements? In the following sections, you might find some useful information
on how you can help this project. In any case, I thank you for taking the time to help me improve this project's deliverables and overall quality.

### Bug Report ###

If you are convinced that you have found a bug, then at the very least you should create a new issue. In that given issue, you should as a minimum describe the following;

* Where is the defect located
* A good, short and precise description of the defect (Why is it a defect)
* How to replicate the defect
* (_A possible solution for how to resolve the defect_)

When time permits it, I will review your issue and take action upon it.

### Fork, code and send pull-request ###

A good and well written bug report can help me a lot. Nevertheless, if you can or wish to resolve the defect by yourself, here is how you can do so;

* Fork this project
* Create a new local development branch for the given defect-fix
* Write your code / changes
* Create executable test-cases (prove that your changes are solid!)
* Commit and push your changes to your fork-repository
* Send a pull-request with your changes
* _Drink a [Beer](https://en.wikipedia.org/wiki/Beer) - you earned it_ :)

As soon as I receive the pull-request (_and have time for it_), I will review your changes and merge them into this project. If not, I will inform you why I choose not to.

## Acknowledgement ##

* [Taylor Otwell](https://github.com/taylorotwell), for creating [Laravel](http://laravel.com) and especially the [Service Container](http://laravel.com/docs/5.1/container), that I'm using daily
* [Jeffrey Way](https://github.com/JeffreyWay), for creating [Laracasts](https://laracasts.com/) - a great place to learn new things... E.g. how facades work!

## Versioning ##

This package uses [Semantic Versioning 2.0.0](http://semver.org/)

## License ##

[BSD-3-Clause](http://spdx.org/licenses/BSD-3-Clause), Read the LICENSE file included in this package