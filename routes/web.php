<?php

Route::get('', function () {
    return redirect()->route('admin.auth.login');
});
