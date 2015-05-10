using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using hackathon.droid.Models.Cards;

namespace hackathon.droid.ListAdapters
{
    public class CardListAdapter : BaseAdapter<CardModel>
    {
        public List<CardModel> Cards { get; set; } 


        public override CardModel this[int position]
        {
            get { return Cards[position]; }
        }

        public override int Count
        {
            get { return Cards.Count; }
        }

        public override long GetItemId(int position)
        {
			return position;
        }

        public override View GetView(int position, View convertView, ViewGroup parent)
        {
			throw NotImplementedException ();
        }
    }
}