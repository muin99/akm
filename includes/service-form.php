<?php
$type = $type ?? 'complaint';
$labels = service_labels($type);
$formNotice = flash('form_error');
$intakeIntro = [
    'complaint' => lang() === 'bn' ? 'স্থানীয় সমস্যা, অভিযোগ বা সেবা ঘাটতির তথ্য পাঠান। জমা দেওয়ার পর পাওয়া কোড দিয়ে অগ্রগতি দেখুন।' : 'Send local problems, complaints, or service gaps. Use the returned code to follow progress.',
    'help' => lang() === 'bn' ? 'সহায়তার প্রয়োজন সম্মানের সঙ্গে জানান। প্রেক্ষাপট পরিষ্কার হলে সেবা ডেস্ক দ্রুত বুঝতে পারবে।' : 'Share assistance needs with dignity. Clear context helps the service desk understand the request.',
    'question' => lang() === 'bn' ? 'আইন, নাগরিক অধিকার বা জনস্বার্থ বিষয়ে প্রশ্ন লিখুন। প্রয়োজন হলে পরবর্তী নির্দেশনা দেওয়া যাবে।' : 'Write questions about law, citizen rights, or public interest so the next step can be guided.',
][$type] ?? '';
?>
<section class="section pt-0">
    <div class="page-shell service-intake">
        <aside class="intake-aside" data-reveal>
            <span class="eyebrow"><?= h(t('public_service')) ?></span>
            <h2><?= h($labels['title']) ?></h2>
            <p><?= h($intakeIntro) ?></p>
            <div class="intake-steps">
                <span><?= lang() === 'bn' ? '০১ তথ্য দিন' : '01 Share details' ?></span>
                <span><?= lang() === 'bn' ? '০২ কোড সংরক্ষণ করুন' : '02 Save code' ?></span>
                <span><?= lang() === 'bn' ? '০৩ অগ্রগতি দেখুন' : '03 Track status' ?></span>
            </div>
        </aside>
        <div class="form-panel form-panel--campaign" data-reveal>
            <?php if ($formNotice): ?>
                <div class="notice error"><?= h(implode(' ', $formNotice['messages'] ?? [])) ?></div>
            <?php endif; ?>
            <?php if (!db_ready()): ?>
                <div class="notice error"><?= lang() === 'bn' ? 'ডাটাবেজ চালু হলে ফর্ম জমা নেওয়া যাবে।' : 'The database must be available before this form can accept submissions.' ?></div>
            <?php endif; ?>
            <form action="<?= h(page_url('submit.php')) ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf" value="<?= h(csrf_token()) ?>">
                <input type="hidden" name="type" value="<?= h($type) ?>">
                <input type="hidden" name="lang" value="<?= h(lang()) ?>">
                <div class="form-grid">
                    <div class="field"><label for="name"><?= lang() === 'bn' ? 'পূর্ণ নাম' : 'Full name' ?></label><input id="name" name="name" required maxlength="140" autocomplete="name"></div>
                    <div class="field"><label for="phone"><?= lang() === 'bn' ? 'ফোন' : 'Phone' ?></label><input id="phone" name="phone" required maxlength="24" inputmode="tel" autocomplete="tel"></div>
                    <div class="field"><label for="email"><?= lang() === 'bn' ? 'ইমেইল (ঐচ্ছিক)' : 'Email (optional)' ?></label><input id="email" name="email" type="email" maxlength="190" autocomplete="email"></div>
                    <div class="field"><label for="nid"><?= lang() === 'bn' ? 'এনআইডি (ঐচ্ছিক)' : 'NID (optional)' ?></label><input id="nid" name="nid" maxlength="40" autocomplete="off"></div>
                    <div class="field">
                        <label for="upazila"><?= lang() === 'bn' ? 'এলাকা' : 'Area' ?></label>
                        <select id="upazila" name="upazila" required>
                            <option value=""><?= lang() === 'bn' ? 'নির্বাচন করুন' : 'Choose' ?></option>
                            <option value="Phulbari"><?= lang() === 'bn' ? 'ফুলবাড়ী' : 'Phulbari' ?></option>
                            <option value="Parbatipur"><?= lang() === 'bn' ? 'পার্বতীপুর' : 'Parbatipur' ?></option>
                            <option value="Other"><?= lang() === 'bn' ? 'অন্যান্য' : 'Other' ?></option>
                        </select>
                    </div>
                    <div class="field"><label for="address"><?= lang() === 'bn' ? 'ঠিকানা (ঐচ্ছিক)' : 'Address (optional)' ?></label><input id="address" name="address" maxlength="255" autocomplete="street-address"></div>
                </div>
                <div class="field field-space"><label for="subject"><?= h($labels['subject']) ?></label><input id="subject" name="subject" required maxlength="180"></div>
                <div class="field field-space"><label for="message"><?= h($labels['details']) ?></label><textarea id="message" name="message" required maxlength="5000"></textarea></div>
                <div class="field field-space">
                    <label for="attachment"><?= lang() === 'bn' ? 'সহায়ক ফাইল (ঐচ্ছিক)' : 'Supporting file (optional)' ?></label>
                    <input id="attachment" name="attachment" type="file" accept=".pdf,.jpg,.jpeg,.png,.webp">
                    <small><?= lang() === 'bn' ? 'PDF বা ছবি, সর্বোচ্চ ৫ এমবি। ব্যক্তিগত তথ্য প্রয়োজন না হলে দেবেন না।' : 'PDF or image, up to 5 MB. Avoid private data unless needed.' ?></small>
                </div>
                <div class="inline-actions field-space">
                    <button class="button" type="submit" <?= db_ready() ? '' : 'disabled' ?>><?= h(t('submit')) ?></button>
                    <a class="text-link" href="<?= h(page_url('tracking.php')) ?>"><?= lang() === 'bn' ? 'আগের আবেদন ট্র্যাক করুন' : 'Track an existing request' ?></a>
                </div>
            </form>
        </div>
    </div>
</section>
