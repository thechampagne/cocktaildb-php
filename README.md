# TheCocktailDB API client

[![](https://img.shields.io/github/v/tag/thechampagne/cocktaildb-php?label=version)](https://github.com/thechampagne/cocktaildb-php/releases/latest) [![](https://img.shields.io/github/license/thechampagne/cocktaildb-php)](https://github.com/thechampagne/cocktaildb-php/blob/main/LICENSE)

TheCocktailDB API client for **PHP**.

### Download

```
composer require xxiv/cocktaildb
```

### Example

```php
<?php

use \XXIV\CocktailDB;

foreach(CocktailDB\search("Margarita") as $drinks) {
  print_r($drinks["strDrink"]);
}
```

### License

This repo is released under the [Apache License 2.0](https://github.com/thechampagne/cocktaildb-php/blob/main/LICENSE).

```
 Copyright 2022 XXIV

 Licensed under the Apache License, Version 2.0 (the "License");
 you may not use this file except in compliance with the License.
 You may obtain a copy of the License at

     http://www.apache.org/licenses/LICENSE-2.0

 Unless required by applicable law or agreed to in writing, software
 distributed under the License is distributed on an "AS IS" BASIS,
 WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 See the License for the specific language governing permissions and
 limitations under the License.
```