I want to build a dynamic page builder system using Laravel (Blade). Please act as a senior full-stack architect and generate a complete scalable solution.

## 🎯 Core Goal:

Create a dynamic CMS where admin can:

* Create pages (like Home, About, Services)
* Add multiple sections inside each page
* Each section contains dynamic HTML content (via CKEditor or raw HTML)
* Render the exact HTML on frontend

---

## 🧱 Features Required:

### 1. Page Management

* Create, edit, delete pages
* Fields:

  * title
  * slug (SEO-friendly URL)
  * meta_title
  * meta_description
  * status (published/draft)

---

### 2. Section Builder (Important)

* Each page can have multiple sections
* Admin clicks “Add Section”

  * Show:

    * Section Name
    * CKEditor (rich text editor)

* Section Features:

  * Add HTML content (h1, h2, p, ul, img, links)
  * Add custom CSS classes (optional field)
  
  * Preview section before saving
  * Edit / Delete section

---

### 3. Content Handling

* Store content as HTML in database
* Allow:

  * CKEditor content
  * Raw HTML input (advanced mode)
* Sanitize content for security (avoid XSS)

---

### 4. Frontend Rendering

* Fetch page by slug
* Loop sections and render:

  * {!! section.content !!}
* Maintain section order
* Apply custom classes

---

### 5. SEO Optimization (Very Important)

* Meta title & description per page
* Auto-check:

  * H1 presence
  * Keyword usage
  * Content length
* Generate SEO score (basic logic)

---

### 6. CKEditor Customization

* Add custom classes (like Tailwind)
* Enable:

  * Image upload
  * Link (internal + external)
  * Heading structure
* Option to switch between:

  * WYSIWYG mode
  * Code (HTML) mode

---

### 7. Advanced Features (Include Best Practice)

* Section types (Hero, Feature, CTA, etc.)
* JSON-based alternative (optional)


---

## 🧠 Technical Requirements:

### Backend:

* Laravel latest version
* Use:

  * Service Layer
  * Repository Pattern (preferred)
* Database design (normalized)
* Migrations for:

  * pages
  * sections

---

### Database Suggestion:

* pages table
* sections table:

  * page_id (FK)
  * name
  * content (LONGTEXT)

---

### Frontend:

* Blade or API + React/Vue
* Clean rendering structure
* Avoid inline script injection issues

---

### Security:

* Prevent XSS
* Validate HTML input
* Use Laravel Purifier or similar

---

## 📦 Deliverables I Expect:

1. Full database schema
2. Migration code
3. Models & relationships
4. Controller logic
5. CKEditor integration
6. Blade rendering
7. SEO scoring logic (simple implementation)
8. Best practices for performance & scalability

---

## 🎯 Important:

* Keep code clean and production-ready
* Explain why each part is used
* Focus on scalable architecture (not quick hack)
* Ensure frontend renders EXACT HTML from database

---

## 🔥 Bonus (If possible):

* Show cache rendered pages
* Show lazy load sections


---

Build this like a mini CMS / page builder (similar to Elementor but simplified).