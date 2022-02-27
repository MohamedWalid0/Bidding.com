# <p align="center"><a href="https://laravel.com" target="_blank"><img src="public/img/bidd.png" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

**_Bidding.com_** is a web-based auction system made for handling the full process of an online auction
to provide a user-friendly website for the buyers and sellers to auction their products easily,
handled multi-dynamic roles and contained a dashboard to control the whole system.
it's designed to be an online trading and auction website with real-time communications tools between bidders and owners
by using Laravel 8, Livewire, Websockets.

## Main Features 

- **[Authentication](#Authentication)**
- **[Authorization](#Authorization)**
- **[Profile](#Profile)**
  - [Update Profile](#Update-Profile)
  - [Rate User](#Rate-User)
  - [Reviews](#Reviews)
  - [Reports](#Reports)
- **[Add Product](#Add-Product)**
- **[Bidding](#Bidding)**
  - [Bid Process](#Bid-Process)
  - [Timer Delay](#Timer-Delay)
  - [End Bidding](#End-Bidding)
  - [Likes](#Likes)
  - [Comments and Replies](#Comments-and-Replies)
- **[Search and Filtering](#Search-and-Filtering)**
- **[Notifications](#Notifications)**
- **[Dashboard](#Dashboard)**
  - [Block User](#Block-User)
  - [Stop Product](#Stop-Product)
  - [Return Product](#Return-Product)

## Contributors
> Thanks goes to these wonderful people in the team.
<table>
  <tr>
    <td align="center">
    <a href="https://github.com/aminyasser" target="_black">
    <img src="https://avatars.githubusercontent.com/u/64032541?s=400&u=869e6019e0fc86d92759f6c7a69fbea67521100e&v=4" width="150px;" style=" border-radius:10px;" alt="Amin Yasser"/>
    <br />
    <sub><b>Amin</b></sub></a>
    <br/>
    </td>
    <td align="center">
    <a href="https://github.com/mahmoud-adel44" target="_black">
    <img src="https://avatars.githubusercontent.com/u/64043496?v=4" width="150px;" style=" border-radius:10px;" alt="Mahmoud Adel"/>
    <br />
    <sub><b>Mahmoud Adel</b></sub></a>
    <br/>
    </td>
    <td align="center">
    <a href="https://github.com/MohamedWalid0" target="_black">
    <img src="https://avatars.githubusercontent.com/u/63995557?v=4" width="150px;" style=" border-radius:10px;" alt="Mohammed Walid"/>
    <br />
    <sub><b>Mohamed Walid</b></sub></a>
    <br/>
    </td>
  </tr>
 </table>

## Authentication

User can Register with Facebook,Twitter or GitHub , or normal Register with the data needed for 
Register like Email, Phone, Location etc, There is a Verification Layer, The email and phone must be vrefy before access 
to profile or add bid on a product. 
And User can Login with email/password or with Facebook,Twitter,GitHub.


## Authorization

We have many roles ``Admin`` ``Moderator`` ``Support Team`` ``User`` , and admin can add a new role 
with different permission and assign this role to any user then user will have some of different permission. 
also you can edit current Role.

![Roles](screenshots/roles.jpg)

## Profile
In Profile Module you can access your data and update it, see your Reviews, see the products you bid on. 
you can rate and review other user, and report user, see other user reviews section.

### Update Profile

User can edit his profile or profile image.

<p float="left">
  <img src="screenshots/update-profile.png" width="400" />
  <img src="screenshots/profile-data.png" width="400" />
</p> 


### Rate User

User can edit his profile or profile image or add additional Review on his Rate.


![Rate](screenshots/Rate.png)


### Reviews

Display User Reviews

![Review](screenshots/Review.png)

### Reports

User can Report Product or User and the admin can see all reports in dashboard and stop product or ban user.

![Report](screenshots/Report-User.png)
![Report](screenshots/Report-Product.png)


## Add Product

System ask about Product details like ``name`` ``images`` ``descreption`` ``location`` 
``start price`` ``category`` ``sub-category`` ``deadline``

![Add Product](screenshots/add-product.png)


## Bidding

The bidding, User can add bid on the product and see the other bidders in real-time with livewire and websockets,
and get notification when any bid get added. 
You can also like product, comment, reply comment if you are the product owner.

### Bid Process 
The real-time change when the user add a bid.

https://user-images.githubusercontent.com/64032541/155890495-e184f1ad-f222-4b15-841d-829457b01588.mp4


### Time Delay

In our Requirements, we assume that when the user add a bid in the last hour, the deadline must delay one hour
to make sure that all other users get the notifications

https://user-images.githubusercontent.com/64032541/155890518-8e4397ba-53d9-423e-8284-d69ac0e06a7c.mp4

### End Bidding
The real-time change when the deadline come.

https://user-images.githubusercontent.com/64032541/155890542-171897af-dbe9-493a-85c6-adc6746d1d21.mp4
### Likes

User can like/dislike Product or Comment.

### Comments and Replies
Any User can add comment on product, but only the product owner can reply on comment.

![Comment](screenshots/Comment.png)


## Search and Filtering

System provide real-time Search for products via navbar search input or search and filtering page.

![Search](screenshots/search.png)

## Notifications
There is many types of notifications 
- Email NotificationsAdmin can send notification to all users or specific user by email.
- Normal Real-time navbar notification when user add bid on product all the bidders and product owner get notified.


## Dashboard

The project dashboard can control the whole system, block users, stop product, modify roles, and control all project.

![Dashboard](screenshots/Dashboard.png)


### Block User

Admin can block any user and this user can't Login again.

![Dashboard](screenshots/Block.png)

### Stop Product
when admin see that product has many reports, The admin can stop it and the product change in real-time.

https://user-images.githubusercontent.com/64032541/155890586-59ae8456-814e-4de5-b4fa-d4e927ab1433.mp4

### Return Product
The admin can return the product and make it open again.

https://user-images.githubusercontent.com/64032541/155890622-6ce8a58b-0a39-4f53-8f6e-f788f9100edc.mp4



