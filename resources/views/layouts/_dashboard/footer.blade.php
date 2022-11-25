<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright © <a
                    class="font-bold text-primary" target="_blank"
                    href="https://www.guidofamula.com">{{ config('app.name') }}</a> - {{ date('Y') }}</div>
            <div>
                <a href="#">
                    {{ trans('dashboard.footer.privacy_policy') }}
                </a>
                ·
                <a href="#">
                    {{ trans('dashboard.footer.terms-and-condition') }}
                </a>
            </div>
        </div>
    </div>
</footer>
