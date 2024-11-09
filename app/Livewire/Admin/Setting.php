<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use \App\Models\Setting as SettingModel;
class Setting extends Component
{
    public $state = [];
    public function mount()
    {
        $exist = SettingModel::first();
        if ($exist) {
            $this->state = $exist->toArray();
        }else{
            $this->state = [
                'sim_cost' => '0',
                'server_status' => '0',
                'server_online_message' => null,
                'server_offline_message' => null,
                'notification_status' => '0',
                'notification_message' => null,
                'contact_page_website_address' => null,
                'contact_page_phone_number' => null,
                'contact_page_email' => null,
                'contact_page_telegram' => null,
                'contact_page_whatsapp' => null,
                'contact_page_facebook' => null,
                'contact_page_instagram' => null,
                'crypto_api' => null,
                'g_captcha_site_key' => null,
                'g_captcha_secret_key' => null,
                'new_user_discount' => '0',
                'auto_refund' => '0',
            ];
        }

    }
    public function updateData()
    {
        $setting = SettingModel::first();
        if (empty($setting)){
            $setting = new SettingModel();
        }
        $setting->fill($this->state);
        if ($setting->save()){
            $this->dispatch('toast',type:'success',message:'Setting Update successfully');
        }else{
            $this->dispatch('toast',type:'error',message:'Setting not Updated');
        }
    }
    #[Layout(ADMIN_LAYOUT)]
    #[Title('Settings')]
    public function render()
    {
        return view('livewire.admin.setting');
    }
}
