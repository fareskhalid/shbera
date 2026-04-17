# Email Configuration Guide for Contact Form

## Current Implementation

The contact form backend is now fully implemented with:

- ✅ Form validation (ContactFormRequest)
- ✅ Email sending (ContactMessage Mailable)
- ✅ Error/success notifications
- ✅ POST route and controller logic
- ✅ HTML email template with bilingual support
- ✅ Input preservation on validation errors

## Email Service Configuration

You need to configure ONE of the following email services by adding the appropriate settings to your `.env` file:

### Option 1: Gmail (Recommended for Small Sites)

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Shbera"
```

**Setup Steps:**

1. Go to https://myaccount.google.com/apppasswords
2. Enable 2-factor authentication first
3. Generate an app password for "Mail" and "Windows Computer"
4. Use the 16-character password as MAIL_PASSWORD

### Option 2: Mailgun (Best for Production)

```env
MAIL_MAILER=mailgun
MAILGUN_SECRET=key-xxxxxxxxxxxxxxxxxxxxxxxxxx
MAILGUN_DOMAIN=sandbox-xxx.mailgun.org
MAIL_FROM_ADDRESS=noreply@sandbox-xxx.mailgun.org
MAIL_FROM_NAME="Shbera"
```

**Setup Steps:**

1. Create free account at https://www.mailgun.com/
2. Get your API key from Dashboard
3. Note your sandbox domain (you can also add a custom domain)

### Option 3: SendGrid

```env
MAIL_MAILER=sendgrid
SENDGRID_API_KEY=SG.xxxxxxxxxxxxxxxxxxxxxxxxxx
MAIL_FROM_ADDRESS=noreply@your-domain.com
MAIL_FROM_NAME="Shbera"
```

**Setup Steps:**

1. Create account at https://sendgrid.com/
2. Generate API key in Settings > API Keys
3. Verify your sender email or domain

### Option 4: AWS SES (Scalable)

```env
MAIL_MAILER=ses
AWS_ACCESS_KEY_ID=your-access-key
AWS_SECRET_ACCESS_KEY=your-secret-key
AWS_DEFAULT_REGION=us-east-1
MAIL_FROM_ADDRESS=noreply@your-domain.com
MAIL_FROM_NAME="Shbera"
```

**Setup Steps:**

1. Create AWS account
2. In SES console, verify your email address or domain
3. Create IAM user with SES permissions
4. Get access keys

### Option 5: SMTP (Your Own Mail Server)

```env
MAIL_MAILER=smtp
MAIL_HOST=mail.your-host.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
MAIL_USERNAME=your-email@your-host.com
MAIL_PASSWORD=your-password
MAIL_FROM_ADDRESS=your-email@your-host.com
MAIL_FROM_NAME="Shbera"
```

Contact your hosting provider for SMTP details.

## Where to Send Emails

Currently, the email is sent to the recipient's email address. To send to a specific admin email instead:

Update `app\Mail\ContactMessage.php` and change the mail sending in `PageController@sendContactMessage`:

```php
Mail::to('admin@shbera.com')->send(new ContactMessage(...));
```

Or send to both:

```php
Mail::to('admin@shbera.com')
    ->cc($validated['email'])
    ->send(new ContactMessage(...));
```

## Testing Email Locally

For development, use Mailtrap:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_ENCRYPTION=tls
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
```

1. Create account at https://mailtrap.io/
2. Copy credentials from Inbox settings
3. All emails will be captured in Mailtrap dashboard

## Files Created

1. **app/Http/Requests/ContactFormRequest.php** - Form validation
2. **app/Mail/ContactMessage.php** - Email Mailable class
3. **resources/views/emails/contact-message.blade.php** - Email template
4. **routes/web.php** - Added POST /contact route
5. **app/Http/Controllers/PageController.php** - Added sendContactMessage() method
6. **resources/views/contact-us.blade.php** - Updated with form action and error display
7. **lang/en/site.php** - Added translation keys
8. **lang/ar/site.php** - Added Arabic translation keys

## Testing

After configuring your email service:

1. Go to `/contact` page
2. Fill out the form with valid data
3. Click "Send Message"
4. Check your email service inbox for the received message
5. You should see a success message on the page

## Security Notes

- All inputs are validated server-side
- Email is sent with CSRF protection
- Form preserves user input on validation errors
- Old input is discarded when submission succeeds
- Errors logged to storage/logs/laravel.log if email sending fails
