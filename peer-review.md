## P3 Peer Review

+ Reviewer's name: Gary H.
+ Reviwee's name: Ram R.
+ URL to Reviewe's P3 Github Repo URL: http://p3.ramarolahy.me

## 1. Interface

The site interface looks good and is clear. I like how the background selector makes a border, although the backgrounds are a little hard to see before the images are made. I think the default quote textarea should be larger because valid quotations can be larger than what is offered (the user shouldn't have to extend it with the mouse). There should be asterisks for all of the required fields. I found the idea of a "text background" a little bit confusing at first; perhaps a better term could be used. 

You might also want to have a direct download link that people can click on to download the completed file when it is finished (although perhaps that would require javascript). I also think the tildes around the person stating the quotation are a bit odd.

## 2. Functional testing

I could easily put in quotations or names that were too long and made for broken images without an error message. Extremely long entries could make the entire website hang.

If a background is not selected, there is no error (it simply selects a random background for you without explanation). Clearing doesn't reset the background, although maybe that is not needed. The "Add Text Background" feature does not refresh in the same manner as the other fields.

I tried to break the image with HTML tags, although that had no effect. I also tried various permutations of the empty and filled form fields; no errors came up.

## 3. Code: Routes

The route code seems simple and straightforward, without any code that should be in a controller. I wondered about having the same name added to both routes; could this create an override since they refer to different methods?

## 4. Code: Views

Template inheritance is used, and Blade seems largely used properly. The {{$var}} reference in home.blade.php doesn't seem clear, and this doesn't seem to be a standard way to enter default information. If this page is not referred to your routes, perhaps it shouldn't be there.

The logic code creating the canvas for the image probably should be done outside of the template. Or perhaps it should be commented a bit more (especially because it uses a javascript library that is abstracting everything). If the upload feature is not working, active logic code referring to it should not be in the view in the script section.

The clear button uses javascript, although my understanding was that this was not encouraged in this project. Perhaps that's ok. Javascript is also used in the view for option one (yet it is not used for the other options; maybe I am missing something here).

## 5. Code: General

While I like the canvas solution and think it is resourceful, I think it would make a lot more sense to have separate code that creates the image outside of the views templating. This is consistent with the class goal of separating logic from the template as much as possible. This would make it much easier to maintain (there aren't really any comments now about how the canvas is being created) and would allow for better images. The canvas image isn't really required in my view. 

Comments aren't spaced consistently in the template.

There are not many comments at all in the controller file, so it is a bit hard to follow. There is one comment that is just "//."

I was unfamiliar with the "\request" syntax, but perhaps this is fine.

I don't think a CSS element "$textBg = 'quote-text__bg';" should be set in a controller file. It seems like that would not be easy to maintain and violates standards. Maybe just a boolean value would be better.

This line seemed odd: "$imgBg = $imgBg = asset ('/images/'. $selectedImg);"

You might want to define the variables with the list of images outside of the function. The randomization feature could also possibly be a function defined outside of the controller.

## 6. Misc

Not of note.
