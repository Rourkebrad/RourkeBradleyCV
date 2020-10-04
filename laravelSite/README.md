# LaravelSite
Build a laravel- powered site

In this project, you will build your own Pet Adoption web application using Laravel. The main (index) page will display a featured pet banner followed by images of both dogs and cats. Each pet entry uses the Unsplash Source API to generate dog and cat images. Your completed Laravel application should have the same functionality as the static website but feel free to change the colors to match your personal style, if you feel comfortable working with Bootstrap.

Tasks completed:
Add necessary routes for each page or view: index, cats and dogs.
Create index.blade.php view as the homepage. This view contains a featured pet and lists of both cat and dog images.
Create cats.blade.php view as the cats page. This view contains only cat images.
Create dogs.blade.php view as the dogs page. This view contains only dog images.
Create views for the head, nav, and footer as follows: head.blade.php, nav.blade.php, and footer.blade.php.
Refactor views by moving code into their own views, using @include for the head, nav, and footer. The body content is different on each page so leave the body content in place.
Create a master template named layout.blade.php and include the head, nav, and footer to the master template.
Add a @section(‘body’) to add the body contents of the index, cat and dog views. Also include @yield('body') in the layout.blade.php file.
Fix the broken active nav links. Highlight active nav link with pink or other accent color, only IF that page is active, or being viewed. Feel free to use the Laravel Basics codebase as reference.

