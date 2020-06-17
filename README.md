# Invylots - Food, left-overs and recipes management tool
A rushed prototype of a food inventory manager done in rough PHP while I was in college in 2014.

## Steps to run the project

1- Create a MySql database
2- import the sql dump of the backup located in the `.\db` folder
3- edit the `.\mysql.php` and `.\mysql2.php` files to use the created user credentials and database
4- run the website in an environment that is able to run PHP files (WAMP)
5- Open the given URL to that deployed website
6- Enjoy! Now you should be able to create your user with the main page

## Notes
Again, this website wasn't meant to be beautiful. This was a personal project I wanted to do since in my familly, I was tired to see my mother to struggle with which food we still have left or not in our storage to be able to decide which dish she can prepare for the next meal.
She enjoyed it while it lasted.

I bought a bluetooth scanner so that she was able to scan item with her mobile tablet openned on that website.

For the "left over" feature, I have bought a small smart sticker printer so she was able to create "unique" barcodes to be able to identify them in the website before storing it in the freezer.

This website had the ability to generate a grocery store list depending on a "threshold" personnaly defined for each food "records". (In the case where you can to keep more than one item in your inventory)

The "recipes" feature allowed her to see which recipes she would be able to make based on her own known inventory quantity. She simply had to "create" a recipe - by scanning required items - then associate a "unique" recipe code on her recipe book so that she can find it back in the website easily.
Then, she can simply use the "see sugestions" button to see every recipes that are "ready" to be done. (all required items are available in the inventory). Then she would simply click on the "cook" button to substract all items required from her inventory instead of removing them one by one.

Since many articles can be spread to many places in the house, a usefull search bar in the header allow you to search by key word (a simple "LIKE %XYZ%" search in the database) to be able to see all items with that word in every locations that contains one.

This project is not finished. I have personnaly planned to remake it in newer technos and framework someday since I have learned a lot now. 

_To be continued._