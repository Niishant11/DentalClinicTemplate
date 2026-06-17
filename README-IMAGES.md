# Images Folder — What Goes Here

This template ships with **no stock or AI-generated photography** on purpose — every "photo" you see in the
preview (doctor portrait, team headshots, clinic interior, before/after cases) is a styled glass/gradient
placeholder built in pure CSS. That keeps the template copyright-safe and ready to re-skin for any client.

Before going live, replace the placeholders with the client's real, consented images. Recommended file names
(drop them straight into this folder — no code changes needed beyond updating `clinic-config.json` where noted):

| Suggested filename            | Used for                                         | Recommended size      |
|--------------------------------|---------------------------------------------------|------------------------|
| `doctor-portrait.jpg`          | About page + homepage "About the Doctor" section | 800×1000px (portrait)  |
| `team-<firstname>.jpg`         | Team carousel / About page team grid              | 600×600px (square)     |
| `clinic-interior-1.jpg` … `-4.jpg` | About page "Inside the Clinic" facility grid  | 800×800px (square)     |
| `case-<name>-before.jpg` / `-after.jpg` | Before/After gallery section            | 700×700px (square)     |
| `logo.svg` or `logo.png`       | Header + footer logo (optional — see below)       | SVG preferred, or 200×200px PNG |
| `favicon.svg`                  | Browser tab icon                                   | 32×32px (square SVG/PNG) |

## How placeholders are wired up

Each placeholder block in the PHP files has an inline HTML comment or caption telling you exactly what it
expects, e.g. *"Replace with Dr. Aanya Kapoor's portrait."* Once you have a real image:

1. Save it into this `Images/` folder using a sensible filename.
2. Find the matching placeholder `<div>` in the relevant page file (`index.php`, `about-us.php`, etc.).
3. Replace the placeholder `<div>...</div>` with an `<img src="<?= asset('Website/Images/your-file.jpg') ?>" alt="...">`
   tag, keeping the same wrapping container class (e.g. `.about-photo-frame`) so the rounded corners and layout
   stay intact.

## Logo and favicon

By default the header/footer render an inline SVG "tooth" mark plus the clinic name as text (driven by
`clinic.logoText` in `clinic-config.json`), so you don't need a logo file at all to launch. If the client has a
real logo:

1. Drop the file in here as `logo.svg` (or `logo.png`).
2. Set `"logoImage": "Website/Images/logo.svg"` inside `clinic-config.json`.
3. The header/footer partials already check for `clinic.logoImage` and will swap to it automatically once it's set.

The same pattern applies to `faviconImage` for the browser tab icon.

## A note on photography rights

Only use photos the client owns the rights to or has explicit permission to publish — particularly for
before/after case photos, which also require the patient's written consent to be shown publicly.