---
name: Justice & Service
colors:
  surface: '#f7faf6'
  surface-dim: '#d7dbd7'
  surface-bright: '#f7faf6'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f1f5f0'
  surface-container: '#ebefea'
  surface-container-high: '#e5e9e5'
  surface-container-highest: '#e0e3df'
  on-surface: '#181d1a'
  on-surface-variant: '#3f4944'
  inverse-surface: '#2d312f'
  inverse-on-surface: '#eef2ed'
  outline: '#6f7a73'
  outline-variant: '#bec9c2'
  surface-tint: '#046c50'
  primary: '#00503a'
  on-primary: '#ffffff'
  primary-container: '#006a4e'
  on-primary-container: '#92e7c3'
  inverse-primary: '#83d7b4'
  secondary: '#7a5900'
  on-secondary: '#ffffff'
  secondary-container: '#fdbc13'
  on-secondary-container: '#6b4d00'
  tertiary: '#74302a'
  on-tertiary: '#ffffff'
  tertiary-container: '#91473f'
  on-tertiary-container: '#ffcac3'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#9ef4d0'
  primary-fixed-dim: '#83d7b4'
  on-primary-fixed: '#002116'
  on-primary-fixed-variant: '#00513b'
  secondary-fixed: '#ffdea3'
  secondary-fixed-dim: '#fdbc13'
  on-secondary-fixed: '#261900'
  on-secondary-fixed-variant: '#5d4200'
  tertiary-fixed: '#ffdad5'
  tertiary-fixed-dim: '#ffb4aa'
  on-tertiary-fixed: '#3c0705'
  on-tertiary-fixed-variant: '#75322b'
  background: '#f7faf6'
  on-background: '#181d1a'
  surface-variant: '#e0e3df'
  paddy-gold: '#D4AF37'
  institutional-blue: '#1A237E'
  surface-off-white: '#F9FBF9'
  neutral-charcoal: '#2D2D2D'
typography:
  display-lg:
    fontFamily: Source Serif 4
    fontSize: 48px
    fontWeight: '700'
    lineHeight: 56px
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Source Serif 4
    fontSize: 32px
    fontWeight: '600'
    lineHeight: 40px
  headline-lg-mobile:
    fontFamily: Source Serif 4
    fontSize: 28px
    fontWeight: '600'
    lineHeight: 36px
  body-md:
    fontFamily: Manrope
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  label-sm:
    fontFamily: JetBrains Mono
    fontSize: 12px
    fontWeight: '500'
    lineHeight: 16px
    letterSpacing: 0.05em
  quote-xl:
    fontFamily: Source Serif 4
    fontSize: 24px
    fontWeight: '400'
    lineHeight: 36px
rounded:
  sm: 0.125rem
  DEFAULT: 0.25rem
  md: 0.375rem
  lg: 0.5rem
  xl: 0.75rem
  full: 9999px
spacing:
  base: 8px
  container-max: 1200px
  gutter: 24px
  margin-mobile: 16px
  section-gap: 80px
---

## Brand & Style

The visual identity of this design system is rooted in the intersection of **Law, Public Service, and Democratic Commitment**. It projects a persona that is authoritative yet accessible, combining the gravity of a barrister's profession with the approachability of a community leader. 

The design style is **Corporate / Modern**, characterized by a systematic grid, clean structured layouts, and a "Digital Desk" philosophy. It moves away from traditional political "clutter" toward a functional, product-led interface that treats citizens as valued stakeholders. The aesthetic is professional and dignified, utilizing high-quality photography, generous whitespace, and institutional motifs to foster trust and stability.

## Colors

The palette is inspired by the national identity of Bangladesh and the 'Sheaf of Paddy' symbol. 
- **Primary:** A deep, professional Green represents growth, national heritage, and the political roots of the brand.
- **Secondary:** A vibrant Gold/Yellow accent used sparingly for high-priority actions and symbolic highlights.
- **Neutral:** A foundation of clean white and off-white ensures legibility and a modern "clerk's desk" feel.
- **Named Colors:** `institutional-blue` is reserved for legal documents and formal archival sections to provide a subtle professional contrast to the brand green.

## Typography

This design system uses a sophisticated typographic pairing to balance tradition and modernity.
- **Headlines:** `Source Serif 4` provides an authoritative, literary, and historical weight suitable for a barrister and political figure. It is used for page titles and significant vision statements.
- **Body:** `Manrope` is a modern, geometric sans-serif that ensures high legibility across digital services and news archives.
- **Labels & Metadata:** `JetBrains Mono` is utilized for technical elements such as tracking codes, dates, and administrative labels, reinforcing the "Digital Desk" and functional nature of the platform.

## Layout & Spacing

The layout follows a **Fixed Grid** philosophy on desktop to maintain a structured, institutional feel. 
- **Grid:** A 12-column system with a 24px gutter. 
- **Service Desk Layout:** Interactive citizen services (complaints, help desk) are arranged in a 3-column "Action Grid" where each module has equal visual weight.
- **Rhythm:** An 8px base unit drives all padding and margin decisions. 
- **Mobile Adaption:** On mobile devices, the 3-column service grid reflows into a single vertical stack. Margins reduce to 16px to maximize content area while maintaining a clean "edge" to the UI.

## Elevation & Depth

To convey a sense of a "Digital Desk," the system uses **Tonal Layers** rather than heavy shadows.
- **Surfaces:** Main content sits on `surface-off-white`. Elevated interactive components like Service Cards use a pure white background with a very subtle, 1px low-contrast outline in a light gray-green tint.
- **Depth:** A single level of elevation is used for primary CTAs (Submit button, File Complaint) using an ambient, low-opacity shadow tinted with the primary green to give a "soft-press" feel.
- **Hierarchy:** Depth is primarily established through color-blocking and clear borders, creating a structured, administrative organization of information.

## Shapes

The shape language is **Soft (0.25rem)**. 
Corners are slightly rounded to feel approachable and modern without appearing "bubbly" or informal. This subtle rounding is applied to service cards, input fields, and news thumbnails. For large structural containers, a sharp edge may be used to reinforce the grid and institutional strength.

## Components

- **Buttons:** Primary buttons are solid `primary_color_hex` with white text. Secondary "Citizen Action" buttons use a gold border with `primary_color_hex` text.
- **Service Cards:** Use a vertical layout with a large numeric indicator (e.g., `01`, `02`) in the `label_font` to guide users through the help desk process.
- **News Archive:** A vertical list view with prominent date stamps in `label_font` and high-contrast headlines.
- **Input Fields:** Clean, rectangular fields with 1px borders. Focus states use a primary green outline.
- **Vision Statement:** Featured in a full-width container using `quote-xl` typography, centered with a decorative divider inspired by the 'Sheaf of Paddy'.
- **Status Badges:** Used for "Tracking Codes" in the help desk, utilizing a monospaced font and a light green background tint.