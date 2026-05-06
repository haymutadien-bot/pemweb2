// SCRIPT.JS - PortoTia JavaScript
'use strict';

document.addEventListener('DOMContentLoaded', function () {

    // ── Active nav highlight based on current hal param ──
    const params = new URLSearchParams(window.location.search);
    const hal    = params.get('hal') || 'home';
    document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href') || '';
        if (href.includes('hal=' + hal)) {
            link.classList.add('active');
        }
    });

    // ── Sidebar active state ──
    document.querySelectorAll('.sidebar-list .list-group-item').forEach(item => {
        const a = item.querySelector('a');
        if (a && a.getAttribute('href') && a.getAttribute('href').includes('hal=' + hal)) {
            item.classList.add('active');
        }
    });

    // ── Auto-dismiss alerts after 4s ──
    const alerts = document.querySelectorAll('.alert-porto');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity    = '0';
            setTimeout(() => alert.remove(), 500);
        }, 4000);
    });

    // ── Confirm delete with custom message ──
    document.querySelectorAll('[data-confirm]').forEach(el => {
        el.addEventListener('click', function (e) {
            if (!confirm(this.dataset.confirm)) {
                e.preventDefault();
            }
        });
    });

    // ── Tooltip init (Bootstrap) ──
    const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltips.forEach(el => new bootstrap.Tooltip(el));

    // ── Image preview on file input ──
    const fileInputs = document.querySelectorAll('input[type="file"][accept*="image"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function (e) {
                let preview = input.nextElementSibling;
                if (!preview || preview.tagName !== 'IMG') {
                    preview = document.createElement('img');
                    preview.style.cssText = 'width:80px;height:80px;object-fit:cover;border-radius:8px;margin-top:8px;display:block;border:2px solid var(--border)';
                    input.insertAdjacentElement('afterend', preview);
                }
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    });

    console.log('✦ PortoTia script loaded.');
});
