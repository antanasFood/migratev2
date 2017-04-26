# EE Migrator
PHP application based on the [phalconphp](https://phalconphp.com/) framework.

## Info
Tool used to migrate data from mychef.ee (Joomla) to foodout.ee (Symfony). This tool includes dishes, food categories, units, units sizes, kitchens, users data migration functions.

## Controllers
### RestaurantMappingController
This controller generates JSON file and saves in /public/files/mapping.json Format is Mychef(OLD) => Foodout(NEW)

### BlogImportController
Imports all categories and blog entries from mychef database to new foodout blog, categories functionality.

### CopyPlaceController
Karolis written function for copying places and placepoints internal in foodout platform. Ex. chili pica and their placepoings

### DishcategoriesController
Creates dish categories for every dish. This was made for estonia import from mychef and set to import dishoption with name "osa"

### DuplicatesController
Removes duplicated dish options by mapping new ones.

### RedirectsController
Generate redirects from mychef old links to new foodout links - restaurants

### ReimportRestaurantController
Reimport restaurant data with dish option prices

### DishOptionsController
Creates new dishoptions for already imported restaurants from mychef to foodout.

### TranslationController
Import translations form mychef to foodout:
KitchenLocalized, FoodCategoriesLocalized, DishUnitsLocalized

### RestaurantTimesController
Imports restaurant work times from mychef to foodout

### RestaurantCategoriesController
Imports restaurant dish categories from mychef to foodout
This checks if no category is provided.

### RestaurantMissingCategoriesController
Imports missing restaurant categories from mychef to foodout. Also creates slugs.

### SlugController
Helper to deal things with slugs.

### UsersImportsController
Import users from mychef to foodout 
