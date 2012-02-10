<?php
namespace Crud\Event;

class Api extends Base {

	public function init(\CakeEvent $event) {
		switch($event->subject->action) {
			case 'index':
			case 'admin_index':
				if (!$event->subject->request->is('get')) {
					throw new \MethodNotAllowedException();
				}
				break;
			case 'add':
			case 'admin_add':
				if (!$event->subject->request->is('post')) {
					throw new \MethodNotAllowedException();
				}
				break;
			case 'edit':
			case 'admin_edit':
				if (!$event->subject->request->is('put')) {
					throw new \MethodNotAllowedException();
				}
				break;
			case 'delete':
			case 'admin_delete':
				if (!$event->subject->request->is('delete')) {
					throw new \MethodNotAllowedException();
				}
				break;
		}
	}

	public function recordNotFound(\CakeEvent $event) {
		throw new \FileNotFoundException();
	}
}