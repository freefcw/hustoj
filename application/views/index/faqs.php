<h1>HUST Online Judge FAQ</h1>
<hr>
<ul>
<li><p class="q"><span>Q</span>:What is the compiler the judge is using and what are the compiler options?</p>
  <p class="a"><span>A</span>:The online judge system is running on <a href="http://www.debian.org/">Debian Linux</a>. We are using <a href="http://gcc.gnu.org/">GNU GCC/G++</a> for C/C++ compile, <a href="http://www.freepascal.org">Free Pascal</a> for pascal compile and <a href="http://www.gnu-pascal.de">sun-java-jdk1.6</a> for Java. The compile options are:</p>
<table border="1">
  <tr><td>C:</td>
    <td class="com-flags">gcc Main.c -o Main -ansi -fno-asm -O2 -Wall -lm --static</td>
  </tr>
  <tr><td>C++:</td>
    <td class="com-flags">g++ Main.c -o Main -ansi -fno-asm -O2 -Wall -lm --static</td>
  </tr>
  <tr><td>Pascal:</td>
    <td class="com-flags">fpc -Co -Cr -Ct -Ci</td>
  </tr>
  <tr><td>Java:</td>
    <td class="com-flags">javac Main.java</td>
  </tr>
</table>
<p>Our compiler software version:<p>
<ul id="compiler-version">
  <li>gcc/g++  4.1.2 20061115 (prerelease) (Debian 4.1.1-21)</li>
  <li>glibc 2.3.6</li>
<li>Free Pascal Compiler version 2.2.4-3 [2009/06/04] for i386</li>
<li>Java 1.6.0_06</li>
</ul>
</li>
<li>
<p class="q"><span>Q</span>:Where is the input and the output?</p>
<p class="a"><span>A</span>:Your program shall read input from stdin('Standard Input') and write output to stdout('Standard Output').For example,you can use 'scanf' in C or 'cin' in C++ to read from stdin,and use 'printf' in C or 'cout' in C++ to write to stdout.<br>
User programs are not allowed to open and read from/write to files, you will get a "<span class="hint">Runtime Error</span>" if you try to do so.<br />
Here is a sample solution for problem 1000 using C++:<br>
<code>
#include &lt;iostream&gt;
using namespace std;
int main(){
    int a,b;
    while(cin >> a >> b)
        cout << a+b << endl;
	return 0;
}
</code>
Here is a sample solution for problem 1000 using C:<br>
<code>
#include &lt;stdio.h&gt;
int main(){
    int a,b;
    while(scanf("%d %d",&amp;a, &amp;b) != EOF)
        printf("%d\n",a+b);
	return 0;
}
</code>
Here is a sample solution for problem 1000 using PASCAL:<br>
<code>
program p1001(Input,Output); 
var 
  a,b:Integer; 
begin 
   while not eof(Input) do 
     begin 
       Readln(a,b); 
       Writeln(a+b); 
     end; 
end.
</code>

Here is a sample solution for problem 1000 using Java:<br>
<code>
public class Main{
	public static void main(String args[]){
		Scanner cin = new Scanner(System.in);
		int a, b;
		while (cin.hasNext()){
			a = cin.nextInt(), b = cin.nextInt();
			System.out.println(a + b);
		}
	}
}</code>
</li>
<li>
<p class="q"><span>Q</span>:Why did I get a Compile Error? It's well done!</p>
<p class="q"><span>A</span>:There are some differences between GNU and MS-VC++, such as:</p>
<ul>
  <li><span>main</span> must be declared as <font color=blue>int</font>, <font color=blue>void main</font> will end up with a Compile Error.<br> 
  <li><font color=green>i</font> is out of definition after block "<font color=blue>for</font>(<font color=blue>int</font> <font color=green>i</font>=0...){...}"<br>
  <li><font color=green>itoa</font> is not an ANSI function.<br>
  <li><font color=green>__int64</font> of VC is not ANSI, but you can use <font color=blue>long long</font> for 64-bit integer.<br>
</ul>
<hr>
<font color=green>Q</font>:What is the meaning of the judge's reply XXXXX?<br>
<font color=red>A</font>:Here is a list of the judge's replies and their meaning:<br>
<p><font color=blue>Pending</font> : The judge is so busy that it can't judge your submit at the moment, usually you just need to wait a minute and your submit will be judged. </p>
<p><font color=blue>Pending Rejudge</font>: The test datas has been updated, and the submit will be judged again and all of these submission was waiting for the Rejudge.</p>
<p><font color=blue>Compiling</font> : The judge is compiling your source code.<br>
</p>
<p><font color="blue">Running &amp; Judging</font>: Your code is running and being judging by our Online Judge.<br>
  </p>
<p><font color=blue>Accepted</font> : OK! Your program is correct!.<br>
  <br>
  <font color=blue>Presentation Error</font> : Your output format is not exactly the same as the judge's output, although your answer to the problem is correct. Check your output for spaces, blank lines,etc against the problem output specification.<br>
  <br>
  <font color=blue>Wrong Answer</font> : Correct solution not reached for the inputs. The inputs and outputs that we use to test the programs are not public (it is recomendable to get accustomed to a true contest dynamic ;-).<br>
  <br>
  <font color=blue>Time Limit Exceeded</font> : Your program tried to run during too much time.<br>
  <br>
  <font color=blue>Memory Limit Exceeded</font> : Your program tried to use more memory than the judge default settings.  <br>
  <br>
  <font color=blue>Output Limit Exceeded</font>: Your program tried to write too much information. This usually occurs if it goes into a infinite loop. Currently the output limit is 1M bytes.<br>
  <br>
  <font color=blue>Runtime Error</font> : All the other Error on the running phrase will get Runtime Error, such as 'segmentation fault','floating point exception','used forbidden functions', 'tried to access forbidden memories' and so on.<br>
</p>
<p>  <font color=blue>Compile Error</font> : The compiler (gcc/g++/gpc) could not compile your ANSI program. Of course, warning messages are not error messages. Click the link at the judge reply to see the actual error message.<br>
  <br>
</p>
<hr>
<p class="q"><span>Q</span>:How to attend Online Contests?</p>
<p class="a"><span>A</span>:Can you submit programs for any practice problems on this Online Judge? If you can, then that is the account you use in an online contest.
If you can't, then please <a href=registerpage.php>register</a> an id with password first.<br/>

<p>Any questions/suggestions please post to <a href="http://algorithm.byhh.net/">Algorithm@BYHH</a></p>
