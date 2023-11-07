<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	protected $contact;

	public function __construct($contact)
	{
		$this->contact = $contact;
	}
	// public function order_mail()
	// {
	// 	return $this->subject('mail_templates.order_sub')            // メールのタイトル
	// 		->from($mailfrom, $mailfromname) // 送信元
	// 		//->cc()  // BCCやCCはここで設定
	// 		->text('mail_templates.verify')  // テンプレートの呼び出し(平文テキスト)
	// 		->with(['contact' => $this->contact]);
	// }
	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		$mailfrom = 'academic@supereigo.com';
		$mailfromname = 'スーパー英語事務局';

		return $this
			->to('hiroyuki.mitsuishi@l-interface.co.jp')
			->subject('タイトル')            // メールのタイトル
			->from($mailfrom, $mailfromname) // 送信元
			//->cc()  // BCCやCCはここで設定
			->view('mail_templates.verify')  // テンプレートの呼び出し(平文テキスト)
			->with($this->contact);
	}
}
