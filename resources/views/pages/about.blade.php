@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="container page-stack">
    <div class="page-intro"><div><p class="eyebrow"><span class="eyebrow-line"></span> About the project</p><h1>Built to learn. Designed to work.</h1><p class="intro-copy">A practical foundation for a modern retail POS experience.</p></div><span class="read-only-note"><span class="note-dot"></span> IT0049 · TFA5</span></div>

    <section class="about-hero" aria-labelledby="about-title"><div><span class="about-overline">The project</span><h2 id="about-title">From zero to four pages, with Laravel.</h2><p>Laravel POS Management System rebuilds a simple point-of-sale foundation with a landing page, an About page, customer accounts, and user accounts. It focuses on clean structure and readable code with SQLite-backed directories and dashboard counts.</p></div><div class="about-hero-mark" aria-hidden="true"><span>4</span><small>connected<br>pages</small></div></section>

    <div class="about-two-column">
        <section class="content-card" aria-labelledby="purpose-title"><p class="eyebrow">Why it exists</p><h2 id="purpose-title">Project purpose</h2><p>This laboratory exercise shows how a request moves through Laravel: a route chooses a controller method, the controller prepares data, and a Blade view renders the page. The same MVC responsibilities will feel familiar to CodeIgniter 4 developers.</p><div class="inline-tag-row"><span>Readable structure</span><span>Consistent navigation</span><span>Responsive design</span></div></section>
        <section class="content-card" aria-labelledby="features-title"><p class="eyebrow">What you can do</p><h2 id="features-title">Main features</h2><ul class="check-list"><li>Explore a dashboard with counts based on database records.</li><li>Browse customer contact details and account status.</li><li>Browse user roles, status, and creation dates.</li><li>Filter both account lists instantly with client-side search.</li></ul></section>
    </div>

    <section class="section-block" aria-labelledby="mvc-title"><div class="section-heading"><div><p class="eyebrow">The architecture</p><h2 id="mvc-title">A simple MVC flow</h2></div><p>Each part has one clear responsibility.</p></div><div class="flow-grid"><article class="flow-card"><span class="flow-number">01</span><h3>Route</h3><p><code>routes/web.php</code> maps a URL to a controller method.</p></article><article class="flow-card"><span class="flow-number">02</span><h3>Controller</h3><p>Eloquent models retrieve SQLite records for controllers to pass into views.</p></article><article class="flow-card"><span class="flow-number">03</span><h3>Blade view</h3><p>Templates render escaped values and loop through records.</p></article></div></section>

    <div class="about-two-column bottom-section"><section class="content-card" aria-labelledby="tech-title"><p class="eyebrow">Technology</p><h2 id="tech-title">Built with familiar tools</h2><div class="tech-list"><div><strong>Laravel 13</strong><span>PHP framework and MVC structure</span></div><div><strong>Blade</strong><span>Reusable server-rendered templates</span></div><div><strong>CSS + JavaScript</strong><span>Responsive styling and instant filtering</span></div><div><strong>SQLite</strong><span>Migrations and seeded directory records</span></div></div></section><section class="content-card content-card-accent" aria-labelledby="objectives-title"><p class="eyebrow">Laboratory objectives</p><h2 id="objectives-title">What this exercise demonstrates</h2><ol class="number-list"><li>Set up and run a Laravel project locally.</li><li>Use Artisan to inspect and generate files.</li><li>Create routes, controllers, and Blade views.</li><li>Query Eloquent models for both listing pages.</li></ol><p class="quiet-note">The directories and dashboard query SQLite. Run the seeder to restore the sample records.</p></section></div>
</div>
@endsection
