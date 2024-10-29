# Poem Pay

### Video Demo:  <URL HERE>

### Description:

#### Mission Statement
The Poem Platform is dedicated to fostering a vibrant community of poets and poetry enthusiasts by providing a space where creativity thrives and poets can be supported through innovative monetization features. Our mission is to create a platform that not only encourages the exchange of poems but also empowers poets to earn from their work, ensuring that poetry remains a sustainable and rewarding pursuit.

### User Features

#### Account Management
- **Registration and Login**: Users can create an account using their email address, ensuring their data is protected through secure login protocols. The platform supports secure password management, including password updates.
- **Profile Management**: Users can personalize their profiles by uploading a profile picture. This allows users to express their identity and connect with others on a more personal level. Profile data updates will be coming soon.

#### Poem Interaction
- **Explore and Discover**: The platform offers a timeline where users can discover poems that match their interests.
- **Poem Uploads**: Users have the ability to upload their own poems to the platform. Each poem can be accompanied by a title, body, and excerpt to improve discoverability. The upload process is designed to be user-friendly, encouraging poets of all skill levels to share their work.
- **Save and Share Poems**: Users can save poems they find meaningful to their saved posts, making it easy to revisit them later. Additionally, the platform allows poems to be shared with others within the platform.
- **Edit and Delete Poems**: Users have full control over their content, with the ability to edit or delete their poems at any time. This feature ensures that users can manage their creative work according to their evolving vision and needs.

#### Community Engagement
- **React to Poems**: Users can engage with poems by leaving reactions, which can include a range of emotions such as love, inspiration, or admiration (only love reaction for now). These reactions help foster a sense of community and provide feedback to poets.
- **Commenting System**: The platform features a robust commenting system, enabling users to leave thoughtful comments on poems. This feature promotes discussion and deeper engagement with the content, allowing poets and readers to connect and converse.
- **Sharing within the Community**: Users can share poems within the platform. This internal sharing feature helps build connections between like-minded users and encourages collaborative creativity.

### Wallet Features

#### Monetization of Poems
-**Earning through Poetry**: Poets can monetize their work by exchanging poems for monetary value based on the number of reactions, comments, and shares their poems receive. The platform provides a structured environment where users can engage with poems, and poets are rewarded financially according to the community’s response to their work. This feature ensures that poets are recognized and compensated for their creativity and contributions.

- **Digital Wallets**: The platform includes integrated digital wallets where users can store funds collected from poem exchanges. The wallet system is secure and easy to use, making it convenient for users to manage their earnings and make transactions.

#### Financial Transactions
- **Phone Number Transfers**: Users can transfer money to others using phone numbers linked to their accounts. This feature simplifies the process of sending and receiving funds, making it easy for users to support each other financially.
- **Real-time Notifications**: The platform provides notifications for all transactions, ensuring users are immediately informed of any financial activity related to their account. This transparency helps users stay on top of their finances and feel secure in their transactions.
- **Detailed Transaction History**: Users have access to a comprehensive transaction history, which includes detailed records of all financial activity. This feature allows users to review their earnings, and other transactions at any time.

#### Scan-to-Pay
- **QR Code Payments**: The platform supports a QR code-based scan-to-pay feature, enabling quick and secure transactions. Users can share QR codes for their account, allowing others to make payments easily and efficiently.

### Admin Panel

#### Dashboard View
- **Comprehensive Overview**: The admin panel features a dashboard that provides a comprehensive overview of platform activity. Administrators can monitor key metrics such as user engagement, poem uploads, transactions, and overall platform performance. This data-driven approach allows administrators to make informed decisions to enhance user experience and platform growth.

#### Administrative Controls
- **Staff Management**: Administrators can manage staff accounts, to ensure that the platform operates smoothly. This feature includes tools for adding, removing, and editing staff members, as well as monitoring their activities.
- **User and Post Moderation**: The admin panel includes robust moderation tools that allow administrators to oversee user activities and manage content on the platform. This includes the ability to flag or remove inappropriate content, ensuring that the platform remains a safe and welcoming environment for all users.

#### Financial Oversight
- **Wallet and Transaction Management**: Administrators have the ability to monitor and manage all wallet activities and transactions on the platform. This includes overseeing fund transfers, managing disputes, and ensuring that all financial operations are conducted securely and transparently.


### Tech Stacks:
`Laravel 8` `Mysql` `blade` `tailwindcss` `serverside-datatable` `jQuery` `javascript` `laravel-breeeze`

### Installation

```shell
git clone https://github.com/Y2theK/poem-pay.git
```

```shell
cp .env.example .env
```

```shell
Setup databases in .env file
```

```shell
composer install
```

```shell
php artisan key:generate
```

```shell
php artisan migrate:fresh --seed
```

```shell
npm install && npm run dev
```

```shell
php artisan serve
```
