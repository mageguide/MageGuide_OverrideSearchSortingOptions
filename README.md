# MageGuide OverrideSearchSortingOptions
Tested on: ```2.3.x```

## Description
Removes position sorting and sets default sorting direction to descending

## Functionalities
- Module utilizes a Magento Plugin to remove position sorting and set default sorting direction to descending

## Installation
- Upload module files in ``app/code/MageGuide/OverrideSearchSortingOptions``
- Install module
```sh
        $ php bin/magento module:enable MageGuide_OverrideSearchSortingOptions
        $ php bin/magento setup:upgrade
        $ php bin/magento setup:di:compile
```