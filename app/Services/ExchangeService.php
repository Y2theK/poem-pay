<?php

namespace App\Services;

use App\Models\Post;
use App\Models\ExchangeConfig;
use Illuminate\Support\Facades\DB;
use App\Services\TransactionService;

class ExchangeService{
    public function __construct(protected TransactionService $transactionService)
    {
        
    }
    public function store(Post $post){
        DB::beginTransaction();
        try {

            $config = ExchangeConfig::firstOrFail();

            $reaction_amount = $post->reactions_count * $config->reaction_rate;
            $comment_amount = $post->comments_count * $config->comment_rate;
            $share_amount = $post->shares_count * $config->share_rate;
    
            $totalExchangableAmount = $reaction_amount + $comment_amount + $share_amount;

            $data = [
                'reaction_amount' => $reaction_amount,
                'comment_amount' => $comment_amount,
                'share_amount' => $share_amount,
                'total_amount' => $totalExchangableAmount
            ];
            $exchangeLog = $post->exchangeLog()->create($data);


            $post->exchange();

            $this->transactionService->postExchange(auth()->user()->wallet,$totalExchangableAmount,$post);

            DB::commit();
            
            return $exchangeLog;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}