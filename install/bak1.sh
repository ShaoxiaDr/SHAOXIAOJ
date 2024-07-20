#!/bin/bash
DATE=`date +%Y%m%d`
OLD=`date -d"1 day ago" +"%Y%m%d"`
OLD3=`date -d"3 day ago" +"%Y%m%d"`

echo "   "
echo "   "
echo "欢迎使用仅备份web文件的备份脚本,少侠Dr致敬每一个热爱创造OJ的同学!"
echo "特别感谢HUSTOJ张老师的辛勤付出!本脚本是基于HUSTOJ二改而成!"
echo "---------------------------------------------------------------------------------"
echo "这里有警告是正常现象，请勿担心，下面的打包压缩耗时较长，请耐心等待备份结束，重新回到命令行提示符。"
echo "正在备份web端的php文件..."
mkdir /var/backups 
if tar cjf /var/backups/shaoxiaoj_${DATE}_phpfiles.tar.bz2 /home/judge/src/web; then
	rm /var/backups/shaoxiaoj_${OLD3}_phpfiles.tar.bz2  2> /dev/null
	# 如果经常遇到磁盘空间不足，可以尝试启用下面的内容
	# find /var/backups/ -maxdepth 2 -ctime 5 -name "*.bz2" -exec rm -f {} \;
fi
echo "备份完成，请用FileZilla下载备份文件：/var/backups/shaoxiaoj_${DATE}_phpfiles.tar.bz2"
echo "备份后的压缩包文件位置为: /var/backups/shaoxiaoj_${DATE}_phpfiles.tar.bz2,少侠OJ期待下次和您相遇~"
