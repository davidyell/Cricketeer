#Hacks
A list of notes about parts of the application which are not perfect, and needed specific workarounds to get things working.

## Non-generation of UUIDs for related inserts
* There are hacks in the views to generate related UUIDs
* There is also a `beforeSave()` method in the `InningsTable` to deal with some id generation 