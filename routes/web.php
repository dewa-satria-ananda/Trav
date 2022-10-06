<?php

use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home controller
Route::get('/', 'HomeController@index')->name('home');
Route::get('/explore', 'HomeController@listExplore')->name('explore');
Route::get('/discussion', 'HomeController@listDiscussion')->name('discussion');
Route::get('/travel-together', 'HomeController@listTrav')->name('trav-together');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/edit-profile', 'HomeController@editProfile')->name('edit-profile');
Route::put('/put-profile', 'HomeController@storeProfile')->name('put-profile');
Route::post('/search', 'HomeController@search')->name('search');
Route::get('/chat', 'HomeController@Chat')->name('chat');


//Visit Profile
Route::get('/visit-profile/{id}', 'HomeController@visitProfile')->name('visit-profile');

//admin controller
Route::get('/admin-page', 'AdminController@admin')->name('admin-home');
Route::get('/manage-user', 'AdminController@manageUser')->name('manage-user');
Route::get('/manage-post', 'AdminController@managePost')->name('manage-post');
Route::get('/manage-travtogether', 'AdminController@manageTravtogether')->name('manage-travtogether');
Route::get('/manage-discussion', 'AdminController@manageDiscussion')->name('manage-discussion');
Route::delete('/manage-user/delete/{id}', 'AdminController@destroyUser')->name('destroy-listuser');
Route::delete('/manage-post/delete/{id}', 'AdminController@destroyPost')->name('destroy-post');
Route::delete('/manage-travtogether/delete/{id}', 'AdminController@destroyRoom')->name('destroy-travtogether');
Route::delete('/manage-discussion/delete/{id}', 'AdminController@destroyDiscussion')->name('destroy-discussion');

// post controller
Route::post('/store-post', 'PostController@storePost')->name('store-post');
Route::get('/detail-post/{id}', 'PostController@detailPost')->name('detail-post');
Route::post('like-post/{id}', 'PostController@likePost')->name('like-post');
Route::post('store-post-comment/{id}', 'PostController@storePostComment')->name('store-post-comment');

// discussion controller
Route::post('/discussion', 'DiscussionController@storeDiscussion')->name('store-discussion');
Route::get('/detail-discussion/{id}', 'DiscussionController@detailDiscussion')->name('detail-discussion');
Route::post('like-discussion/{id}', 'DiscussionController@likeDiscussion')->name('like-discussion');
Route::post('/store-discussion-comment/{id}', 'DiscussionController@storeDiscussionComment')->name('store-discussion-comment');

// travTogether controller
Route::post('/travel-together', 'TravTogetherController@storeTravTogether')->name('store-trav-together');
Route::get('/detail-room/{id}', 'TravTogetherController@detailTravTogether')->name('detail-room');
Route::post('join-room/{id}', 'TravTogetherController@joinRoom')->name('join-room');
Route::delete('/delete-room/{id}', 'TravTogetherController@destroyRoom')->name('delete-room');
Route::delete('/leave-room/{id}', 'TravTogetherController@leaveRoom')->name('leave-room');

//follow controller
Route::post('/follow/{id}', 'FollowController@storeFollow')->name('follow');

//chat controller
Route::get('/chatting/{id}', 'ChatController@listChat')->name('chatting');
Route::post('/send-chat/{id}', 'ChatController@SendChat')->name('send-chat');
Route::post('/start-chat/{id}', 'ChatController@StartChat')->name('start-chat');

Auth::routes();

// Route::get('/profile', 'HomeController@profile')->name('profile');
// Route::get('/chat', 'HomeController@chat')->name('chat');
// Route::get('/room-detail', 'HomeController@room_detail')->name('room-detail');
// Route::get('/discussion-detail', 'HomeController@discussion_detail')->name('discussion-detail');
