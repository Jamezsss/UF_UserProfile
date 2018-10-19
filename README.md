# Custom User Profile Field Sprinkle for [UserFrosting 4](https://www.userfrosting.com)

[![StyleCI](https://github.styleci.io/repos/83981830/shield?branch=master)](https://github.styleci.io/repos/83981830) [![UserFrosting Version](https://img.shields.io/badge/UserFrosting->=%204.1-brightgreen.svg)](https://github.com/userfrosting/UserFrosting) [![Donate](https://img.shields.io/badge/Donate-Buy%20Me%20a%20Coffee-brightgreen.svg)](https://ko-fi.com/A7052ICP)

This Sprinkle makes it easy to add any custom fields to the user or group model. Simply create a new schema in you own sprinkle and you're done. Your new profile fields will be automcatically integrated in the default UserFrosting interface.

> This version only works with UserFrosting 4.1.x !

# Help and Contributing

If you need help using this sprinkle or found any bug, feels free to open an issue or submit a pull request. You can also find me on the [UserFrosting Chat](https://chat.userfrosting.com/) most of the time for direct support. 

# Installation

Edit UserFrosting `app/sprinkles.json` file and add the following to the `require` list : `"lcharette/uf_userprofile": "^2.0.0"`. Also add `FormGenerator` and `UserProfile` to the `base` list. For example:

```
{
    "require": {
        "lcharette/uf_userprofile": "^2.0.0"
    },
    "base": [
        "core",
        "account",
        "admin",
        "FormGenerator",
        "UserProfile"
    ]
}
```

Run `composer update` then `php bakery bake` to install the sprinkle.

# Usage

To add a custom profile fields to any user, you simply add a [FormGenerator](https://github.com/lcharette/UF_FormGenerator) compliant schema containing the `form` key as well as the traditional [validation schema](https://learn.userfrosting.com/routes-and-controllers/client-input/validation). The rest is generated by this Sprinkle.

For example, you can add the following to a `schema/userProfile/myFields.json` file inside your sprinkle to add a `location`, `occupation` and `gender` user field. With the associated locale keys, that's all you have to do to add a new user field to your UserFrosting setup.
```
{
    "location" : {
        "validators" : {
            "length" : {
                "label" : "LOCATION",
                "min" : 1,
                "max" : 255,
                "message" : "VALIDATE.LENGTH_RANGE"
            }
        },
        "form": {
            "type": "text",
            "label": "LOCATION",
            "icon": "fa-globe"
        }
    },
    "occupation" : {
        "validators" : {
            "length" : {
                "label" : "OCCUPATION",
                "min" : 1,
                "max" : 255,
                "message" : "VALIDATE.LENGTH_RANGE"
            }
        },
        "form": {
            "type": "textarea",
            "label": "OCCUPATION",
            "icon": "fa-briefcase"
        }
    },
    "gender" : {
        "validators" : {},
        "form": {
            "type": "select",
            "label": "GENDER",
            "icon": "fa-transgender",
            "options" : {
                "1" : "GENDER.MALE",
                "2" : "GENDER.FEMALE",
                "3" : "GENDER.NEUTRAL"
            }
        }
    }
}
```

Note that the schema must be saved inside the `schema/userProfile/` directory of your sprinkle to be picked up automatically by the system. You might also want to run `php bakery clear-cache` command from the UserFrosting root since thoses fields are stored in cache for better performances. 

You can also specify **groups** custom fields by saving any schema in the the `schema/groupProfile/` directory of your sprinkle.

## Screenshots

![Screenshot 1](/screenshots/UF_UserProfile1.png?raw=true)
![Screenshot 1](/screenshots/UF_UserProfile2.png?raw=true)

# Licence
By [Louis Charette](https://github.com/lcharette). Copyright (c) 2017, free to use in personal and commercial software as per the MIT license.
