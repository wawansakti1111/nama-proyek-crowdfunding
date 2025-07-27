<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kampanye Baru') }}
        </h2>
    </x-slot>

    <style>
        body {
            background-color: #ffffff;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            background: linear-gradient(135deg, #f8fffe 0%, #f0fdf4 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .form-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 
                0 20px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(34, 197, 94, 0.1);
            overflow: hidden;
            position: relative;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #10b981, #34d399, #6ee7b7);
        }

        .form-header {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            padding: 2rem;
            border-bottom: 1px solid rgba(34, 197, 94, 0.1);
        }

        .form-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: #065f46;
            text-align: center;
            margin: 0;
        }

        .form-body {
            padding: 2.5rem;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #047857;
            margin-bottom: 0.75rem;
            font-size: 1rem;
            position: relative;
        }

        .form-input,
        .form-textarea,
        .form-select {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #d1fae5;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #ffffff;
            color: #1f2937;
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
            transform: translateY(-1px);
        }

        .form-input:hover,
        .form-textarea:hover,
        .form-select:hover {
            border-color: #6ee7b7;
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .file-input-wrapper {
            position: relative;
            border: 2px dashed #a7f3d0;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-input-wrapper:hover {
            border-color: #34d399;
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
        }

        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-input-content {
            color: #047857;
            font-weight: 500;
        }

        .payment-section {
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 2px solid #f0fdf4;
        }

        .payment-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #065f46;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
        }

        .payment-method-card {
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
            border: 2px solid #d1fae5;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            position: relative;
            transition: all 0.3s ease;
        }

        .payment-method-card:hover {
            border-color: #a7f3d0;
            box-shadow: 0 8px 25px -5px rgba(16, 185, 129, 0.1);
            transform: translateY(-2px);
        }

        .payment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .remove-method-btn {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .remove-method-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(239, 68, 68, 0.4);
        }

        .add-method-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 1rem auto;
            font-size: 0.95rem;
        }

        .add-method-btn:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #f0fdf4;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.95rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-secondary {
            background: #f9fafb;
            color: #374151;
            border: 2px solid #e5e7eb;
        }

        .btn-secondary:hover {
            background: #f3f4f6;
            border-color: #d1d5db;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }

            .form-body {
                padding: 1.5rem;
            }

            .payment-grid {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .form-title {
                font-size: 1.5rem;
            }
        }

        /* Enhanced visual effects */
        .form-input:focus + .form-label::after,
        .form-textarea:focus + .form-label::after,
        .form-select:focus + .form-label::after {
            width: 100%;
        }

        .form-label::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #10b981, #34d399);
            transition: width 0.3s ease;
        }
    </style>

    <div class="main-container">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="form-card">
                <div class="form-header">
                    <h1 class="form-title">✨ Tambah Kampanye Baru</h1>
                </div>
                
                <div class="form-body">
                    <form action="{{ route('admin.campaigns.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title" class="form-label">Judul Kampanye</label>
                            <input type="text" name="title" id="title" class="form-input" value="{{ old('title') }}" placeholder="Masukkan judul kampanye yang menarik..." required>
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" rows="5" class="form-textarea" placeholder="Ceritakan tentang kampanye Anda dengan detail..." required>{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">Gambar Kampanye (Opsional)</label>
                            <div class="file-input-wrapper">
                                <input type="file" name="image" id="image" class="file-input" accept="image/*">
                                <div class="file-input-content">
                                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">📸</div>
                                    <div style="font-weight: 600;">Klik untuk memilih gambar</div>
                                    <div style="font-size: 0.875rem; color: #6b7280; margin-top: 0.25rem;">PNG, JPG hingga 10MB</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="target_amount" class="form-label">Target Donasi (Rp)</label>
                            <input type="number" name="target_amount" id="target_amount" class="form-input" value="{{ old('target_amount') }}" placeholder="Contoh: 1000000" required min="1000">
                        </div>

                        <div x-data="{
                            paymentMethods: {{ json_encode(old('payment_methods', [['type' => 'bank', 'name' => 'BCA', 'account_holder_name' => '', 'account_details' => '']])) }},
                            banks: {{ json_encode(config('payment_options.banks')) }},
                            ewallets: {{ json_encode(config('payment_options.ewallets')) }},
                            addMethod() { 
                                this.paymentMethods.push({ 
                                    type: 'bank', 
                                    name: 'BCA', 
                                    account_holder_name: '', 
                                    account_details: '' 
                                }); 
                            },
                            removeMethod(index) { 
                                if (this.paymentMethods.length > 1) { 
                                    this.paymentMethods.splice(index, 1); 
                                } 
                            }
                        }" class="payment-section">
                            <h3 class="payment-title">💳 Metode Pembayaran</h3>
                            
                            <template x-for="(method, index) in paymentMethods" :key="index">
                                <div class="payment-method-card">
                                    <button type="button" @click="removeMethod(index)" x-show="paymentMethods.length > 1" class="remove-method-btn">&times;</button>
                                    
                                    <div class="payment-grid">
                                        <div class="form-group">
                                            <label class="form-label">Tipe</label>
                                            <select :name="'payment_methods[' + index + '][type]'" x-model="method.type" class="form-select">
                                                <option value="bank">🏦 Bank</option>
                                                <option value="ewallet">📱 E-Wallet</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label">Nama</label>
                                            <select :name="'payment_methods[' + index + '][name]'" x-model="method.name" class="form-select">
                                                <template x-if="method.type === 'bank'">
                                                    <template x-for="(bankName, bankCode) in banks" :key="bankCode">
                                                        <option :value="bankCode" x-text="bankName"></option>
                                                    </template>
                                                </template>
                                                <template x-if="method.type === 'ewallet'">
                                                    <template x-for="(ewalletName, ewalletCode) in ewallets" :key="ewalletCode">
                                                        <option :value="ewalletCode" x-text="ewalletName"></option>
                                                    </template>
                                                </template>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label">Atas Nama</label>
                                            <input type="text" :name="'payment_methods[' + index + '][account_holder_name]'" x-model="method.account_holder_name" class="form-input" placeholder="Nama Pemilik Rekening" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label">No. Rekening / Telepon</label>
                                            <input type="text" :name="'payment_methods[' + index + '][account_details]'" x-model="method.account_details" class="form-input" placeholder="Nomor Rekening/Telepon" required>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            
                            <button type="button" @click="addMethod()" class="add-method-btn">
                                <span>➕</span>
                                Tambah Metode Pembayaran
                            </button>
                        </div>

                        <div class="button-group">
                            <a href="{{ route('admin.campaigns.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Kampanye</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

