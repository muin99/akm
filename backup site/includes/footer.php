<footer class="site-footer">
    <div class="footer-main">
        <div class="footer-brand-block">
            <a class="footer-brand" href="<?= h(page_url(($pathPrefix ?? '') . 'index.php')) ?>">
                <span class="brand-mark">AKM</span>
                <span>
                    <strong><?= lang() === 'bn' ? 'ব্যারিস্টার একেএম কামরুজ্জামান' : 'Barrister AKM Kamruzzaman' ?></strong>
                    <small><?= lang() === 'bn' ? 'দিনাজপুর-৫ | ফুলবাড়ী ও পার্বতীপুর' : 'Dinajpur-5 | Phulbari & Parbatipur' ?></small>
                </span>
            </a>
            <p><?= lang() === 'bn' ? 'আইন, জনসেবা, গণতান্ত্রিক অঙ্গীকার এবং স্থানীয় উন্নয়ন ভাবনাকে এক জায়গায় আনার একটি আধুনিক নাগরিক প্ল্যাটফর্ম।' : 'A modern civic platform bringing together law, public service, democratic commitment, and local development vision.' ?></p>
            <div class="footer-actions">
                <a class="button" href="<?= h(page_url(($pathPrefix ?? '') . 'complaint.php')) ?>"><?= lang() === 'bn' ? 'অভিযোগ করুন' : 'Submit complaint' ?></a>
                <a class="footer-ghost" href="<?= h(page_url(($pathPrefix ?? '') . 'tracking.php')) ?>"><?= h(t('tracking')) ?></a>
            </div>
        </div>
        <div class="footer-column">
            <h3><?= lang() === 'bn' ? 'প্রধান পেজ' : 'Main pages' ?></h3>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'about.php')) ?>"><?= h(t('about')) ?></a>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'dinajpur.php')) ?>"><?= h(t('dinajpur')) ?></a>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'reform.php')) ?>"><?= h(t('reform')) ?></a>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'media.php')) ?>"><?= h(t('media')) ?></a>
        </div>
        <div class="footer-column">
            <h3><?= lang() === 'bn' ? 'সেবা ডেস্ক' : 'Service desk' ?></h3>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'complaint.php')) ?>"><?= h(t('complaint')) ?></a>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'help.php')) ?>"><?= h(t('help')) ?></a>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'question.php')) ?>"><?= h(t('question')) ?></a>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'tracking.php')) ?>"><?= h(t('tracking')) ?></a>
        </div>
        <div class="footer-column footer-contact">
            <h3><?= lang() === 'bn' ? 'রিসোর্স' : 'Resources' ?></h3>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'legal-advice.php')) ?>"><?= h(t('legal_advice')) ?></a>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'faq.php')) ?>"><?= h(t('faq')) ?></a>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'services.php')) ?>"><?= h(t('services')) ?></a>
            <a href="<?= h(page_url(($pathPrefix ?? '') . 'admin/index.php')) ?>"><?= h(t('admin')) ?></a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Copyright &copy; 2026. All rights reserved.</p>
        <p>Developed by <a href="https://onukrom.xyz" target="_blank" rel="noopener noreferrer">Onukrom</a></p>
    </div>
</footer>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="<?= h(($assetPrefix ?? '') . 'assets/js/site.js') ?>"></script>
</body>
</html>
