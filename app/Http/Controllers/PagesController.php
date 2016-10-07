<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function home(){
		return view('pages.home');
		//return View::make('pages.home');
	}
	public function about(){
		return view('pages.about');
		//return View::make('pages.about');
	}
	public function projects(){
		return view('pages.projects');
		//return View::make('pages.projects');
	}
	public function contact(){
		return view('pages.contact');
		//return View::make('pages.contact');
	}
	public function inventory_purchase_order(){
		return view('pages.inventory.inventory_purchase_order');
	}
	public function inventory_receiving(){
		return view('pages.inventory.inventory_receiving');
	}
	public function inventory_adjustments(){
		return view('pages.inventory.inventory_adjustments');
	}
	//Accounts Payable controllers
	public function accounts_payable_enter_bills(){
		return view('pages.accounts_payable.accounts_payable_enter_bills');
	}
	public function accounts_payable_pay_bills(){
		return view('pages.accounts_payable.accounts_payable_pay_bills');
	}
	//Sales controllers
	public function sales_invoice(){
		return view('pages.sales.sales_invoice');
	}
	public function sales_cash_receipts(){
		return view('pages.sales.sales_cash_receipts');
	}
	public function sales_supplier_invoice(){
		return view('pages.sales.sales_supplier_invoice');
	}
	//General Journal Entries controllers
	public function general_journal_entries_maintenance(){
		return view('pages.general_journal_entries.general_journal_entries_maintenance');
	}
	public function general_journal_entries_vendor(){
		return view('pages.general_journal_entries.general_journal_entries_vendor');
	}
	public function general_journal_entries_inventory_items(){
		return view('pages.general_journal_entries.general_journal_entries_inventory_items');
	}
	public function general_journal_entries_customers(){
		return view('pages.general_journal_entries.general_journal_entries_customers');
	}
	public function general_journal_entries_cost_center(){
		return view('pages.general_journal_entries.general_journal_entries_cost_center');
	}
	//Reports controllers
	public function reports_balance_sheet(){
		return view('pages.reports.reports_balance_sheet');
	}
	public function reports_profit_and_loss_ytd(){
		return view('pages.reports.reports_profit_and_loss_ytd');
	}
	public function reports_profit_and_loss_12_months(){
		return view('pages.reports.reports_profit_and_loss_12_months');
	}
	public function reports_cash_position_report(){
		return view('pages.reports.reports_cash_position_report');
	}
	public function reports_trial_balance(){
		return view('pages.reports.reports_trial_balance');
	}
	public function reports_aging_of_receivables(){
		return view('pages.reports.reports_aging_of_receivables');
	}
	public function reports_aging_of_payables(){
		return view('pages.reports.reports_aging_of_payables');
	}
	public function reports_inventory_profitability_report(){
		return view('pages.reports.reports_inventory_profitability_report');
	}
	public function reports_official_receipts_register(){
		return view('pages.reports.reports_official_receipts_register');
	}
	public function reports_sales_invoice_register(){
		return view('pages.reports.reports_sales_invoice_register');
	}
	public function reports_check_register(){
		return view('pages.reports.reports_check_register');
	}
	public function reports_audit_trail(){
		return view('pages.reports.reports_audit_trail');
	}
	//tests routes
	public function test(){
		return view('pages.tests.test');
	}
	
}
