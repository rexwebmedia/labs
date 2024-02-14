(function () {

    var currentDate = new Date, targetDate = new Date("2024-01-01"), dev = currentDate < targetDate;
    var csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    try {
        window.axios.defaults.headers.common = {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfToken,
        };
    } catch (e) {
        dev && console.log(e);
    }

    function getAxiosError(err) {
        let msg = 'An error occurred, try again.';
        if (err?.response?.data?.message) {
            msg = err.response.data.message;
        } else if (err?.message) {
            msg = err.message;
        }
        return msg;
    }


    var modelCreateForms = document.querySelectorAll('[data-js="form-model-create"]');
    if (modelCreateForms) {
        for (var i = 0; i < modelCreateForms.length; i++) {
            modelCreateForms[i].addEventListener('submit', function (e) {
                e.preventDefault();
                let form = this;
                let submitBtn = form.querySelectorAll('[data-js="form-submit-btn"]');
                submitBtn.disabled = true;
                let url = form.getAttribute('action');
                let data = new FormData(form);
                axios.post(url, data).then(function (res) {
                    Toastify({
                        text: (res.data?.message) ? res.data.message : 'An error occurred',
                        className: (res.data?.success) ? 'toast-success' : 'toast-error',
                        position: 'center',
                    }).showToast();
                    if (res.data.redirect) {
                        window.location.href = res.data.redirect;
                    }
                    dev && console.log('modelCreateForms: ', res.data);
                }).catch(function (err) {
                    let errMsg = getAxiosError(err);
                    Toastify({
                        text: errMsg,
                        className: 'toast-error',
                        position: 'center',
                    }).showToast();
                    dev && console.log(err);
                }).finally(function () {
                });
            });
        }
    }

    var appForms = document.querySelectorAll('[data-js="app-form"]');
    if (appForms) {
        for (var i = 0; i < appForms.length; i++) {
            appForms[i].addEventListener('submit', function (e) {
                e.preventDefault();
                let form = this;
                let data = new FormData(form);
                let url = form.getAttribute('action');
                let submitBtn = form.querySelector('[data-js="app-form-btn"]');
                let submitStatus = form.querySelector('[data-js="app-form-status"]');
                let submitBtnLoader = form.querySelector('[data-js="app-form-btn-loader"]');
                submitBtn.disabled = true;
                submitBtnLoader.classList.remove('hidden');
                submitStatus.textContent = 'Please wait...';
                submitStatus.classList.remove('hidden');
                axios.post(url, data).then(function (res) {
                    if (res.redirect) {
                        window.location.href = res.redirect;
                    }
                    let msg = (res.data?.message) ? res.data.message : 'Success';
                    submitStatus.textContent = msg;
                    Toastify({
                        text: msg,
                        className: (res.data?.success) ? 'toast-success' : 'toast-error',
                        position: 'center',
                    }).showToast();
                    dev && console.log('appForms: ', res.data);
                }).catch(function (err) {
                    let msg = getAxiosError(err);
                    Toastify({
                        text: msg,
                        className: 'toast-error',
                        position: 'center',
                    }).showToast();
                    submitStatus.textContent = msg;
                    dev && console.log(err);
                }).finally(function () {
                    submitBtn.disabled = false;
                    submitBtnLoader.classList.add('hidden');
                });
            });
        }
    }

    var previewImgInputs = document.querySelectorAll('[data-js="preview-img-input"]');
    if (previewImgInputs) {
        for (var i = 0; i < previewImgInputs.length; i++) {
            previewImgInputs[i].addEventListener('change', function (e) {
                var el = this;
                if (e.target.files[0]) {
                    var targetKey = el.getAttribute('data-target-img');
                    var targetEl = document.getElementById(targetKey);
                    if (targetEl) {
                        var previewURL = URL.createObjectURL(e.target.files[0]);
                        targetEl.src = previewURL;
                    }
                }
            });
        }
    }



})();