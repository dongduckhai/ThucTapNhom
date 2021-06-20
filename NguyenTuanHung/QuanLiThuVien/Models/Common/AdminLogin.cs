using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace QuanLiThuVien.Models.Common
{
    [Serializable]
    public class AdminLogin
    {
        public string UserName { set; get; }
        public int id { set; get; }
    }
}