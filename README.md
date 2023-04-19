# DashboardTaskSorting

#### _Plugin for [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software")_

This plugin changes the **default** sorting of the _tasks_ on the _dashboard_ overview and _my tasks_ site.

The sorting logic is now:

1. Sort by due date ASC, while keeping tasks without any due date at the bottom.
2. Then sort by priority DESC.

Also _(since version 1.5.0)_ there is the option to group task by their columnnames on the "My tasks" view.


Screenshots
-------------

**Sort example dashboard**

![TagiDashboardTaskSorting sort example dashboard](../master/Screenshots/DashboardTaskSorting_sort_example.png)


Compatibility
-------------

- Requires [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.26`

#### Other Plugins & Action Plugins
- _No known issues_
#### Core Files & Templates
- `01` template overrides
- _No database changes_


Changelog
---------

Read the full [**Changelog**](../master/changelog.md "See changes")
 

Installation
------------

1. Go into Kanboards `plugins/` folder
2. `git clone https://github.com/Tagirijus/DashboardTaskSorting`


Authors & Contributors
----------------------

- [@Tagirijus](https://github.com/Tagirijus) - Author
- _Contributors welcome_


License
-------
- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")
