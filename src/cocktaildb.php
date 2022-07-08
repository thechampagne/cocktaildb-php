<?php
/**
 * TheCocktailDB API client
 *
 * @author  XXIV
 * @license Apache 2.0
 */
namespace XXIV\CocktailDB;

class CocktailDBException extends \Exception {}

function _getRequest($endpoint) {
  $response = @file_get_contents("https://thecocktaildb.com/api/json/v1/1/$endpoint");
  if ($response === false) {
    throw new \Exception($http_response_header[0]);
  }
  return $response;
}

/**
 * Search cocktail by name.
 *
 * @param s Cocktail name.
 * @return Array of Cocktail.
 * @throws CocktailDBException if something went wrong.
 */
function search($s) {
  try {
    $response = _getRequest("search.php?s=$s");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    return $data["drinks"];
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * Search cocktails by first letter.
 *
 * @param c Cocktails letter.
 * @return Array of Cocktail.
 * @throws CocktailDBException if something went wrong.
 */
function searchByLetter($c) {
  try {
    $response = _getRequest("search.php?f=$c[0]");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    return $data["drinks"];
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * Search ingredient by name.
 *
 * @param s Ingredient name.
 * @return Ingredient.
 * @throws CocktailDBException if something went wrong.
 */
function searchIngredient($s) {
  try {
    $response = _getRequest("search.php?i=$s");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["ingredients"] || count($data["ingredients"]) === 0) {
      throw new \Exception("no results found");
    }
    return $data["ingredients"][0];
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * Search cocktail details by id.
 *
 * @param i Cocktail id.
 * @return Cocktail.
 * @throws CocktailDBException if something went wrong.
 */
function searchById($i) {
  try {
    $response = _getRequest("lookup.php?i=$i");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    return $data["drinks"][0];
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * Search ingredient by ID.
 *
 * @param i Ingredient ID.
 * @return Ingredient.
 * @throws CocktailDBException if something went wrong.
 */
function searchIngredientById($i) {
  try {
    $response = _getRequest("lookup.php?iid=$i");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["ingredients"] || count($data["ingredients"]) === 0) {
      throw new \Exception("no results found");
    }
    return $data["ingredients"][0];
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * Search a random cocktail.
 *
 * @return Random cocktail.
 * @throws CocktailDBException if something went wrong.
 */
function random() {
  try {
    $response = _getRequest("random.php");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    return $data["drinks"][0];
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * Filter by ingredient.
 *
 * @param s Ingredient name.
 * @return Array of Filter.
 * @throws CocktailDBException if something went wrong.
 */
function filterByIngredient($s) {
  try {
    $response = _getRequest("filter.php?i=$s");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    return $data["drinks"];
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * Filter by alcoholic.
 *
 * @param s Alcoholic name.
 * @return Array of Filter.
 * @throws CocktailDBException if something went wrong.
 */
function filterByAlcoholic($s) {
  try {
    $response = _getRequest("filter.php?a=$s");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    return $data["drinks"];
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * Filter by Category.
 *
 * @param s Category name.
 * @return Array of Filter.
 * @throws CocktailDBException if something went wrong.
 */
function filterByCategory($s) {
  try {
    $response = _getRequest("filter.php?c=$s");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    return $data["drinks"];
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * Filter by Glass.
 *
 * @param s Glass name.
 * @return Array of Filter.
 * @throws CocktailDBException if something went wrong.
 */
function filterByGlass($s) {
  try {
    $response = _getRequest("filter.php?g=$s");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    return $data["drinks"];
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * List the categories filter.
 *
 * @return Array of String.
 * @throws CocktailDBException if something went wrong.
 */
function categoriesFilter() {
  try {
    $response = _getRequest("list.php?c=list");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    $arr = array();
    foreach($data["drinks"] as $i) {
      array_push($arr,$i["strCategory"]);
    }
    return $arr;
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * List the glasses filter.
 *
 * @return Array of String.
 * @throws CocktailDBException if something went wrong.
 */
function glassesFilter() {
  try {
    $response = _getRequest("list.php?g=list");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    $arr = array();
    foreach($data["drinks"] as $i) {
      array_push($arr,$i["strGlass"]);
    }
    return $arr;
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * List the ingredients filter.
 *
 * @return Array of String.
 * @throws CocktailDBException if something went wrong.
 */
function ingredientsFilter() {
  try {
    $response = _getRequest("list.php?i=list");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    $arr = array();
    foreach($data["drinks"] as $i) {
      array_push($arr,$i["strIngredient1"]);
    }
    return $arr;
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}

/**
 * List the alcoholic filter.
 *
 * @return Array of String.
 * @throws CocktailDBException if something went wrong.
 */
function alcoholicFilter() {
  try {
    $response = _getRequest("list.php?a=list");
    if (strlen($response) === 0) {
      throw new \Exception("no results found");
    }
    $data = json_decode($response, true);
    if (!$data["drinks"] || count($data["drinks"]) === 0) {
      throw new \Exception("no results found");
    }
    $arr = array();
    foreach($data["drinks"] as $i) {
      array_push($arr,$i["strAlcoholic"]);
    }
    return $arr;
  } catch(\Exception $err) {
    throw new CocktailDBException($err->getMessage());
  }
}
?>