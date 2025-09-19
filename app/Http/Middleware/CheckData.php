<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)

        { 
           $errors = [];

            if (!$request->has('name') || strlen($request->name) < 3) {
                $errors['name'] = 'Tên phải >= 3 ký tự';
            }

            if (!$request->has('phone') || strlen($request->phone) > 12) {
                $errors['phone'] = 'Số điện thoại tối đa 12 số';
            }
            
            if (!$request->has('email') || strpos($request->email, '@') === false) {
                $errors['email'] = 'Email phai co ki tu @';
            }
            if (!$request->has('tieude') || strlen($request->tieude) > 50) {
                $errors['tieude'] = 'Tiêu đề tối đa 50 ký tự';
            }

            if (!$request->has('noidung') || strlen($request->noidung) > 150) {
                $errors['noidung'] = 'Nội dung tối đa 150 ký tự';
            }

            if (!empty($errors)) {
                return redirect()->back()->withInput()->with('errors', $errors);
            }
                

        return $next($request);
    }
}
