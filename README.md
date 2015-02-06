Main logic contains two function for loading rss feeds into array, and sort it by datetime.

For set up you must follow vendor instruction? from help page and configure database with current project url.

It use bootcards UI (simple bootstrap fork) for view. You can see example of how to get rss feed and sort
 it it in index.php file. also with same way < $item->feature > you can take any other part of feed item.

TODO: move index.php file in other folder, for example main/public, for now moving this file in any other place -broke
 all vote script styles and scripts.